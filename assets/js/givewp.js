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
    }
}

function isIframeExist() {
    setInterval(() => {
        if (giveIframe !== null) {
            return;
        }

        if (document.querySelector('.single-campaign') === null) {
            return;
        }

        reduceImgSize();
    }, 500);
}

isIframeExist();
/* ===[End Change image height for giveWP iFrame (Form)]=== */