/* ===[Start Change image height for giveWP iFrame (Form)]=== */
var giveIframe = null;

function reduceImgSize() {
    giveIframe = document.querySelector('.single-campaign #iFrameResizer0');
    
    if (giveIframe !== null) {
        let height = '350px';
        
        if (window.innerWidth < 768) {
            height = '200px';
        }

        giveIframe.contentWindow.document.querySelector('.image').style.cssText = `
            height: ${height};
            padding: 0;
        `;

        giveIframe.contentWindow.document.querySelector('body').style.minHeight = 'auto';
    }
}

function isIframeExist() {
    setInterval(() => {
        // In case when iFrame load to stop Interval
        if (giveIframe !== null) {
            return;
        }

        // In case when this is not the single campaign page stop Interval (This is just for protection but the script will load only in single campaign page)
        if (document.querySelector('.single-campaign') === null) {
            return;
        }

        reduceImgSize();
    }, 500);
}

isIframeExist();
/* ===[End Change image height for giveWP iFrame (Form)]=== */