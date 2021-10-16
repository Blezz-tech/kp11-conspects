class Options {
    constructor (height, width, bg, fontSize, textAlign) {
        this.height    = height;
        this.width     = width;
        this.bg        = bg;
        this.fontSize  = fontSize;
        this.textAlign = textAlign;
    }
    createDiv() {
        let div = document.createElement('div');
        document.body.appendChild(div);
        div.style.cssText = `height:${this.height}px;
                              width:${this.width}px;
                              background-color:${this.bg};
                              font-size:${this.fontSize}px;
                              text-align:${this.textAlign}`;
    }
}

const myDiv = new Options(200, 300, "blue", 20, "center");
myDiv.createDiv();