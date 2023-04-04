<?php

/**
 * Hierarchy Board
 * hierarchy_board_title
 * 
 */

function hierarchy_board_scripts()
{
    // wp_enqueue_script('bonyan-orgchart', get_template_directory_uri() . '/dist/js/cdn/orgchart.js', array('jquery'), $GLOBALS['bonyan_version']);
    wp_enqueue_script('bonyan-orgchart', 'https://balkan.app/js/OrgChart.js', array('jquery'), $GLOBALS['bonyan_version']);

?>
    <!-- <script>
        <?php
        //require_once(get_template_directory() . '/dist/js/cdn/orgchart.js');
        ?>
    </script> -->
    <?php
}
add_action('wp_enqueue_scripts', 'hierarchy_board_scripts');


add_action('wp_ajax_edit_hierarchy_map', 'edit_hierarchy_map');
add_action('wp_ajax_nopriv_edit_hierarchy_map', 'edit_hierarchy_map');
function edit_hierarchy_map()
{
    // Check for nonce security      
    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        die('Busted!');
    }
    $roles = ['administrator'];
    if (!check_user_role($roles)) {
        die('Busted!');
    }

    $current_page_id = $_POST['current_page_id'];   // Get Current Page ID From Ajax Request
    $new_map = $_POST['new_map'];                   // Get Edited Map From Ajax Request
    $new_map = str_replace("\"", "'", $new_map);    // remove " and replace it with ' to be compatible with Wpbakery Context
    if (!empty($current_page_id) && !empty($new_map)) { // Check The Data Who Are Send From Ajax Request
        $post_will_edit = get_post($current_page_id);  // Get Current Page Data By ID
        $post_content = $post_will_edit->post_content; // get the current content
        $default_content_check = str_contains("hierarchy_board_map", $post_content); // Check if the content contain the default value

        if (!$default_content_check) { // if first initialization
            $post_content = str_replace("hierarchy_board", 'hierarchy_board hierarchy_board_map=""', $post_content); // Add Field If it is not exits
        }

        $search = "/hierarchy_board_map=\"[^\"]*\"/"; // Set Regular Expression
        $replace = "hierarchy_board_map=\"{$new_map}\"";    // Set The New Field Data With New Map 
        $new_post_content = preg_replace($search, $replace, $post_content); // Replace old map With new One  Based On Regular Expression
        // Set Array To Update Post (Page)
        $new_edited_post_content = array(
            'ID'           => $current_page_id,
            'post_content' => $new_post_content
        );
        wp_update_post($new_edited_post_content);
    }
}



if (!function_exists('hierarchy_board_shortcode')) {
    function hierarchy_board_shortcode($atts)
    {

        extract(shortcode_atts(array(
            'hierarchy_board_map'     => ''
        ), $atts));

        ob_start();
        wp_enqueue_media();
    ?>
        <?php //========[{ Enqueue Widget Style }]========//
        if (!function_exists('hierarchy_board_register_style')) {
            function hierarchy_board_register_style()
            {
        ?>
                <style>
                    <?php
                    require_once(get_template_directory() . "/dist/css/components/wpb/hierarchy.min.css");
                    ?>
                </style>
        <?php
            }
            hierarchy_board_register_style();
        }
        if (empty($hierarchy_board_map)) { // if first initialization Set Default Value
            $hierarchy_board_map = "{'id':'1','Name':'Jack Hill','Title':'Chairman and CEO','Email':'amber@domain.com','ImgUrl':'https://people.math.ethz.ch/~afigalli/avatar.jpg'}|";
        }

        $prepare_to_json = str_replace("'", "\"", $hierarchy_board_map);
        $objects_array = explode("|", $prepare_to_json);
        $array_of_objects_to_js = array();
        foreach ($objects_array as $key => $object) {
            if ($key == count($objects_array) - 1) {
                continue;
            }
            $temp_object = json_decode($object);
            array_push($array_of_objects_to_js, $temp_object);
        }


        ?>


        <!-- START Hierarchy HTML -->
        <div class="container">
            <div class="hierarchy-tree-container my-2 my-lg-4">
                <div style="width:100%; height: 600px;" id="tree"></div>
            </div>
            <?php
            $roles = ['administrator'];
            if (check_user_role($roles)) {
            ?>
                <button class="primary-btn wpb-bonyan-btn" id="edit-map-btn">Save</button>
            <?php } ?>
        </div>
        <!-- END Hierarchy HTML -->

        <?php

        //========[{ Enqueue Widget script }]========//
        if (!function_exists('hierarchy_board_register_script')) { // Prevent duplicate Script In The Same Page
            function hierarchy_board_register_script($array_of_objects_to_js)
            {
                global $post;

        ?>
                <script>
                    // Screen Width
                    const screenWidth = document.documentElement.clientWidth;

                    // Page Direction
                    const pageDir = document.documentElement.dir;

                    if (pageDir === 'rtl') {
                        OrgChart.templates.ana.field_1 = '<text data-width="130" data-text-overflow="multiline" style="font-size: 14px;" fill="#ffffff" x="230" y="30" text-anchor="start">{val}</text>';
                    }

                    let treeTemplate = "ana";
                    let _layout = OrgChart.layout.tree;
                    let zoomMode = OrgChart.action.ctrlZoom;

                    if (screenWidth < 1025) {
                        _layout = OrgChart.layout.mixed;
                        zoomMode = OrgChart.action.zoom;
                    }

                    let members = <?php echo json_encode($array_of_objects_to_js); ?>;

                    let membersTree = document.getElementById('tree');

                    if (membersTree !== null) {
                        let adminJson = {
                            // Show search input or not
                            enableSearch: false,

                            // zoom: false,
                            mouseScrool: zoomMode,

                            // Enable/Disable Pan
                            enablePan: true,

                            // Enable / Disable Drag and Drop
                            enableDragDrop: true,

                            // Choose the template
                            template: treeTemplate,

                            // We can use this only for mobile to make it show better
                            layout: _layout,

                            // For Responsiveness
                            scaleInitial: OrgChart.match.boundary,
                            scaleMin: 0.5,
                            scaleMax: 2,

                            // Uncomment in case of (Admin)
                            nodeMenu: {
                                details: {
                                    text: "Details"
                                },
                                edit: {
                                    text: "Edit"
                                },
                                add: {
                                    text: "Add"
                                },
                                remove: {
                                    text: "Remove"
                                }
                            },

                            // For (User) to hide edit button in form
                            // editForm: {
                            //     buttons: {
                            //         edit: null,
                            //     }
                            // },

                            editForm: {
                                generateElementsFromFields: false,
                                photoBinding: "ImgUrl",
                                elements: [{
                                        type: 'textbox',
                                        label: 'Full Name',
                                        binding: 'Name'
                                    },
                                    {
                                        type: 'textbox',
                                        label: 'Title',
                                        binding: 'Title'
                                    },
                                    {
                                        type: 'textbox',
                                        label: 'Photo Url',
                                        binding: 'ImgUrl',
                                        btn: 'Upload'
                                    },
                                    {
                                        type: 'textbox',
                                        label: 'Email Address',
                                        binding: 'Email',
                                    },
                                ],
                                buttons: {
                                    edit: {
                                        icon: OrgChart.icon.edit(24, 24, '#fff'),
                                        text: 'Edit',
                                        hideIfEditMode: true,
                                        hideIfDetailsMode: false
                                    },
                                    share: {
                                        icon: OrgChart.icon.share(24, 24, '#fff'),
                                        text: 'Share'
                                    },
                                    pdf: {
                                        icon: OrgChart.icon.pdf(24, 24, '#fff'),
                                        text: 'Save as PDF'
                                    },
                                    remove: {
                                        icon: OrgChart.icon.remove(24, 24, '#fff'),
                                        text: 'Remove',
                                        hideIfDetailsMode: true
                                    }
                                }
                            },

                            // Adding a toolbar for: layout, zoom, fit, expandAll and fullscreen
                            // toolbar: {
                            //     layout: false,
                            //     zoom: false,
                            //     fit: true,
                            //     expandAll: false,
                            //     fullScreen: true
                            // },

                            // Animations options
                            anim: {
                                func: OrgChart.anim.outBack,
                                duration: 500
                            },

                            // It's responsible for preparing the data which is going to be visible on each node
                            nodeBinding: {
                                img_0: "ImgUrl",
                                field_0: "Name",
                                field_1: "Title",
                            },

                            // Here the DATA
                            nodes: members
                        };
                        let userJson = {
                            // Show search input or not
                            enableSearch: false,

                            // zoom: false,
                            mouseScrool: zoomMode,

                            // Enable/Disable Pan
                            enablePan: true,

                            // Enable / Disable Drag and Drop
                            enableDragDrop: true,

                            // Choose the template
                            template: treeTemplate,

                            // We can use this only for mobile to make it show better
                            layout: _layout,

                            // For Responsiveness
                            scaleInitial: OrgChart.match.boundary,
                            scaleMin: 0.5,
                            scaleMax: 2,

                            // Adding a toolbar for: layout, zoom, fit, expandAll and fullscreen
                            // toolbar: {
                            //     layout: false,
                            //     zoom: false,
                            //     fit: true,
                            //     expandAll: false,
                            //     fullScreen: true
                            // },

                            // Animations options
                            anim: {
                                func: OrgChart.anim.outBack,
                                duration: 500
                            },

                            // It's responsible for preparing the data which is going to be visible on each node
                            nodeBinding: {
                                img_0: "img",
                                field_0: "name",
                                field_1: "title",
                            },

                            // Here the DATA
                            nodes: members
                        }
                        let ChartJson =
                            <?php
                            $roles = ['administrator'];
                            if (check_user_role($roles)) {
                            ?>adminJson;
                        <?php
                            } else {
                        ?>userJson;
                    <?php
                            }
                    ?>
                    var chart = new OrgChart(membersTree, ChartJson);

                    chart.editUI.on('element-btn-click', function(sender, args) {

                        // Create the media frame.
                        file_frame_upload = wp.media.frames.file_frame = wp.media({
                            library: {
                                type: ['image']
                            },
                            multiple: false // Set to true to allow multiple files to be selected
                        });
                        const imglimit = 0; // images upload items limit
                        file_frame_upload.on('select', function() {
                            // set multiple to false so only get one image from the uploader
                            attachment = file_frame_upload.state().get('selection').toJSON();
                            // here are some of the variables you could use for the attachment;
                            var url = attachment[0].url;
                            args.input.value = url;


                        });

                        // Finally, open the modal
                        file_frame_upload.open();
                    });

                    chart.on('click', function(sender, args) {
                        // Edit Mode
                        // sender.editUI.show(args.node.id, false);

                        //details mode
                        sender.editUI.show(args.node.id, true);
                        return false; //to cansel the click event
                    });

                    // On Initialize
                    chart.on('init', (treeObject) => {});

                    // On Update, This will be fired once an information changed (On clicking save and close button)
                    chart.on('update', (treeObject) => {
                        members = treeObject.config.nodes;
                    });

                    // On Add
                    chart.on('add', (treeObject) => {
                        members = treeObject.config.nodes;
                    })

                    // On Remove
                    chart.on('remove', (treeObject) => {
                        members = treeObject.config.nodes;
                    })
                    }


                    (function($) {
                        $("#edit-map-btn").on('click', function() {
                            $(this).css('opacity', '0.2');
                            let NewMap = "";
                            members.forEach(element => NewMap += JSON.stringify(element) + "|");

                            $.ajax({
                                dataType: "json",
                                method: "POST",
                                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                                data: {
                                    action: "edit_hierarchy_map",
                                    nonce: '<?php echo wp_create_nonce('ajax-nonce'); ?>',
                                    current_page_id: '<?php echo $post->ID; ?>',
                                    new_map: NewMap
                                },
                                statusCode: {
                                    400: function(data) {
                                        toastr.error(data.responseJSON.error_message);

                                    },
                                    200: function(data) {
                                        $(this).css('opacity', '1');
                                        toastr.success("Map Successfully Edited");

                                    },
                                },

                            });

                        });


                    })(jQuery);
                </script>

        <?php

            }
            hierarchy_board_register_script($array_of_objects_to_js);
        } ?>

<?php
        return ob_get_clean();
    }
}

add_shortcode('hierarchy_board', 'hierarchy_board_shortcode');
