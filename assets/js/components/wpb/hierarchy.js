console.log(OrgChart.length);

if (OrgChart) {
    console.log("Yes");
} else {
    console.log("No");
}

const screenWidth = document.documentElement.clientWidth;
let treeTemplate = "ana";
let layout = OrgChart.layout.tree;
let zoomMode = OrgChart.action.zoom;

if (screenWidth < 1200) {
    // treeTemplate = "rony";
    layout = OrgChart.layout.mixed;
    zoomMode = OrgChart.action.ctrlZoom;
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

OrgChart.templates.ana.field_1 = '<text data-width="130" data-text-overflow="multiline" style="font-size: 14px;" fill="#ffffff" x="230" y="30" text-anchor="start">{val}</text>';

var chart = new OrgChart(document.getElementById("tree"), {
    // Show search input or not
    enableSearch: false,

    // Orientation
    // orientation: OrgChart.orientation.top,

    // Disable Zoom
    // zoom: false,
    mouseScrool: zoomMode,

    // Enable/Disable Pan
    enablePan: true,

    // Enable / Disable Drag and Drop
    // enableDragDrop: false,

    // Enable touch instead of mouse for particular devices with touchscreen/touchpad/trackpad. Default value - false.
    // I have noticed that it effect the drag and drop functionality
    // enableTouch: true,

    // Choose the template
    template: treeTemplate,

    // We can use this only for mobile to make it show better
    layout: layout,

    // To control the spaces between the parents and children
    // levelSeparation: 50,

    // To control the spaces between subtress
    // subtreeSeparation: 500,

    // To control the assistant separation spaces
    // assistantSeparation: 150

    // We use tag in order to specify some configuration only for specific node and more...
    // https://balkan.app/OrgChartJS/API/interfaces/OrgChart.options#tags
    tags: {
        // myTag: {template: 'olivia'},

        // as well as we can use some special tag names for some purposes such as assistance to make it not a main node but assistant node
        "assistant": {/* Here we can give it specific template */}
    },

    // To display minimap
    // miniMap: true,

    // Dark for popups
    // mode: "dark",

    // In case of willing to draw extra lines for clarifications
    // slinks: [
    //     {from: 4, to: 0, label: 'text'}, 
    //     {from: 4, to: 5, template: 'blue', label: '4 reports to 3' },
    //     {from: 2, to: 6, template: 'yellow', label: 'lorem ipsum' }
    // ],

    // It's kind of similar to slinks but it's curved
    // clinks: [
    //     {from: 4, to: 0, label: 'text'}, 
    //     {from: 4, to: 5, template: 'blue', label: '4 reports to 3' },
    //     {from: 2, to: 6, template: 'yellow', label: 'lorem ipsum' }
    // ],

    // Add dotted lines from specific node to another
    // dottedLines: [
    //     {from: 6, to: 1 }
    // ],

    // For Responsiveness
    scaleInitial: OrgChart.match.boundary,
    // scaleInitial: OrgChart.match.width,
    // scaleInitial: OrgChart.match.height,

    nodeMenu:{
        details: {text:"Details"},
        edit: {text:"Edit"},
        add: {text:"Add"},
        remove: {text:"Remove"}
    },
        
    // Edit the form that pops when click on the node
    

    // Adding a toolbar for: layout, zoom, fit, expandAll and fullscreen
    // toolbar: {
    //     layout: false,
    //     zoom: false,
    //     fit: true,
    //     expandAll: false,
    //     fullScreen: true
    // },

    // Animations options
    // anim: {func: OrgChart.anim.outBack, duration: 500},

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
    sender.editUI.show(args.node.id, false);

    //details mode
    // sender.editUI.show(args.node.id, true);
    return false; //to cansel the click event
});

chart.on('init', (treeObject) => {
    console.log(treeObject.config.nodes);
 });

// This will be fired once an information changed (On clicking save and close button)
chart.on('update', (treeObject) => {
    members = treeObject.config.nodes;
});

// On Redraw
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

//https://code.balkan.app/org-chart-js/templates#JS templates references

//https://balkan.app/OrgChartJS-Demos/EventHandlers.html event references
//https://balkan.app/OrgChartJS/API/classes/OrgChart#on-1 this as well for events