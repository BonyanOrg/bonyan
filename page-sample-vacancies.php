<?php get_header(); ?>
<?php echo get_template_part('template-parts/page-head') ?>

<div class="container">
    <div class="global-header-search">
        <h2 class="bonyan-title primary-color">Recent jobs</h2>

        <div class="input-holder">
            <input type="search" class="custom-datatable-search" placeholder="Search in this page">
        </div>
    </div>

    <div class="vacancies-container">
        <table id="vacancies-table" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
            <thead>
                <tr>
                    <th><?php _e('Job', 'bonyan'); ?></th>
                    <th><?php _e('Status', 'bonyan'); ?></th>
                    <th><?php _e('Deadline', 'bonyan'); ?></th>
                    <th><?php _e('Department', 'bonyan'); ?></th>
                    <th><?php _e('Location', 'bonyan'); ?></th>
                </tr>
            </thead>
            <tbody>
            <tr isactive="true" isurgent="true">
                    <td><a href="#">Marketing specialist <span class="urgent">Urgent</span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="true">
                    <td><a href="#">Senior Data Analyst <span class="urgent">Urgent</span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Data</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="true">
                    <td><a href="#">Marketing specialist <span class="urgent">Urgent</span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="true">
                    <td><a href="#">Senior Data Analyst <span class="urgent">Urgent</span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Data</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="false">
                    <td><a href="#">Distributor <span class="urgent"></span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="false" isurgent="false">
                    <td><a href="#">Marketing specialist <span class="urgent"></span></a></td>
                    <td>Inactive</td>
                    <td>06 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="false">
                    <td><a href="#">Distributor <span class="urgent"></span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="false" isurgent="false">
                    <td><a href="#">Marketing specialist <span class="urgent"></span></a></td>
                    <td>Inactive</td>
                    <td>06 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="true">
                    <td><a href="#">Marketing specialist <span class="urgent">Urgent</span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="true">
                    <td><a href="#">Senior Data Analyst <span class="urgent">Urgent</span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Data</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="false">
                    <td><a href="#">Distributor <span class="urgent"></span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="false" isurgent="false">
                    <td><a href="#">Marketing specialist <span class="urgent"></span></a></td>
                    <td>Inactive</td>
                    <td>06 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="true">
                    <td><a href="#">Marketing specialist <span class="urgent">Urgent</span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="true">
                    <td><a href="#">Senior Data Analyst <span class="urgent">Urgent</span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Data</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="false">
                    <td><a href="#">Distributor <span class="urgent"></span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="false" isurgent="false">
                    <td><a href="#">Marketing specialist <span class="urgent"></span></a></td>
                    <td>Inactive</td>
                    <td>06 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="false">
                    <td><a href="#">Distributor <span class="urgent"></span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="false" isurgent="false">
                    <td><a href="#">Marketing specialist <span class="urgent"></span></a></td>
                    <td>Inactive</td>
                    <td>06 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="true">
                    <td><a href="#">Senior Data Analyst <span class="urgent">Urgent</span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Data</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="false">
                    <td><a href="#">Distributor <span class="urgent"></span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="false" isurgent="false">
                    <td><a href="#">Marketing specialist <span class="urgent"></span></a></td>
                    <td>Inactive</td>
                    <td>06 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="false">
                    <td><a href="#">Distributor <span class="urgent"></span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="false" isurgent="false">
                    <td><a href="#">Marketing specialist <span class="urgent"></span></a></td>
                    <td>Inactive</td>
                    <td>06 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="true">
                    <td><a href="#">Marketing specialist <span class="urgent">Urgent</span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Sales</td>
                    <td>Istanbul, Turkey</td>
                </tr>

                <tr isactive="true" isurgent="true">
                    <td><a href="#">Senior Data Analyst <span class="urgent">Urgent</span></a></td>
                    <td>Active</td>
                    <td>20 DEC 2022</td>
                    <td>Data</td>
                    <td>Istanbul, Turkey</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php get_footer();
