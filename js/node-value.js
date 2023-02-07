var itemTwo = document.getElementById("two");

var elText = itemTwo.firstChild.nodeValue;

elText = elText.replace('кедровые орешки', 'белокочанная капуста');

itemTwo.firstChild.nodeValue = elText;
