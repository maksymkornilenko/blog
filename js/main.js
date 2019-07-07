window.onload = function () {
    // обрезка текста
    var textBlocks = document.querySelectorAll('p');
    for (var i = 0; i < textBlocks.length; i++) {
        var text = textBlocks[i].innerHTML;
        textBlocks[i].innerHTML = '';
        for (var j = 101; j > 0; j--) {
            if (text[j] !== " ") {
                continue;
            } else {
                var str = j;
                break;
            }
        }
        var sliced = text.slice(0, str);
        textBlocks[i].innerHTML = sliced;

    }
};