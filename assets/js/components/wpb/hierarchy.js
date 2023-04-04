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

let members = [
    { id: "1", name: "Jack Hill", title: "Chairman and CEO", email: "amber@domain.com", img: "https://people.math.ethz.ch/~afigalli/avatar.jpg" },
    { id: "2", pid: "1", name: "Lexie Cole", title: "QA Lead", email: "ava@domain.com", img: "https://people.math.ethz.ch/~afigalli/avatar.jpg" },
    { id: "3", pid: "1", name: "Janae Barrett", title: "Technical Director Technical Director Technical Director", img: "https://people.math.ethz.ch/~afigalli/avatar.jpg" },
    { id: "4", pid: "2", name: "Lexie Cole", title: "QA Lead", email: "ava@domain.com", img: "https://people.math.ethz.ch/~afigalli/avatar.jpg" },
    { id: "5", pid: "3", name: "Lexie Cole", title: "QA Lead", email: "ava@domain.com", img: "https://people.math.ethz.ch/~afigalli/avatar.jpg" },
    { id: "6", pid: "4", name: "Lexie Cole", title: "QA Lead", email: "ava@domain.com", img: "https://people.math.ethz.ch/~afigalli/avatar.jpg" },
    { id: "7", pid: "4", name: "Lexie Cole", title: "QA Lead", email: "ava@domain.com", img: "https://people.math.ethz.ch/~afigalli/avatar.jpg" },
    { id: "8", pid: "5", name: "Lexie Cole", title: "QA Lead", email: "ava@domain.com", img: "https://people.math.ethz.ch/~afigalli/avatar.jpg" },
    { id: "9", pid: "5", name: "Lexie Cole", title: "QA Lead", email: "ava@domain.com", img: "https://people.math.ethz.ch/~afigalli/avatar.jpg" },
];


let membersTree = document.getElementById('tree');

if (membersTree !== null) {
    var chart = new OrgChart(membersTree, {
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
        // nodeMenu:{
        //     details: {text:"Details"},
        //     edit: {text:"Edit"},
        //     add: {text:"Add"},
        //     remove: {text:"Remove"}
        // },

        // For (User) to hide edit button in form
        editForm: {
            buttons: {
                edit: null,
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
        anim: {func: OrgChart.anim.outBack, duration: 500},
    
        // It's responsible for preparing the data which is going to be visible on each node
        nodeBinding: {
            img_0: "img",
            field_0: "name",
            field_1: "title",
        },
    
        // Here the DATA
        nodes: members
    });

    chart.on('click', function(sender, args){
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
    
    // On Redraw (Any changes in the draw of the hierarchy)
    // chart.on('redraw', (treeObject) => {
    //     console.log(treeObject.config.nodes);
    // });
    
    // On Add
    chart.on('add', (treeObject) => {
        members = treeObject.config.nodes;
    })
    
    // On Remove
    chart.on('remove', (treeObject) => {
        members = treeObject.config.nodes;
    })
}