dragDrop("#img-well", function(files) {
    //const convertPNG = document.querySelector('#convertpng').checked
    const is360 = true
    const pinIpfs = true
    const makeAsset = true
    const resize = false

    const buffers = []
    let pending = 0
    files.forEach((f) => {
        pending++
        const reader = new FileReader()
        reader.onload = () => {
            let imageBuffer = Buffer.from(reader.result)

            let name = f.fullPath.substring(1)
            let ext = f.fullPath.split('.')[1]
            buffers[name] = [imageBuffer, name]
            pending--
            if (pending == 0) finish()
        }
        reader.readAsArrayBuffer(f)
    })

    function saveByteArray(fileName, byte) {
        var blob = new Blob([byte]);
        //call ipfs here
        var link = document.createElement('a');
        document.body.appendChild(link)
        link.style = 'display: none'
        link.href = window.URL.createObjectURL(blob);
        link.download = fileName;
        link.click();
    };

    var saveByteArray2 = (function() {
        var a = document.createElement("a");
        document.body.appendChild(a);
        a.style = "display: none";
        return function(name, data) {
            var blob = new Blob(data, { type: "octet/stream" }),
                url = window.URL.createObjectURL(blob);
            a.href = url;
            a.download = name;
            a.click();
            window.URL.revokeObjectURL(url);
        };
    }());

    function finish() {
        try {
            saveToIpfs(buffers, pinIpfs, is360, makeAsset)
        } catch (e) {
            alert("Something went wrong: " + e)
        }
    }

})

function makePowerOfTwo(image) {
    var h, w

    if (image instanceof HTMLImageElement || image instanceof HTMLCanvasElement || image instanceof ImageBitmap) {

        var _canvas = document.createElementNS('http://www.w3.org/1999/xhtml', 'canvas');
        h = image.height
        w = image.width
        _canvas.width = Math.floorPowerOfTwo(w);
        _canvas.height = Math.floorPowerOfTwo(h);

        var context = _canvas.getContext('2d');
        context.drawImage(image, 0, 0, _canvas.width, _canvas.height);

        console.warn('THREE.WebGLRenderer: image is not power of two (' + w + 'x' + h + '). Resized to ' + _canvas.width + 'x' + _canvas.height, image);

        return _canvas;

    }

    return [image, parseInt(w * 10000 / h)];

}