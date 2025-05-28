const firstItem = document.getElementById('one');

const itemContent = firstItem.innerHTML;

const text = '<a href=\"http://example.org\">' + itemContent + '</a>';

firstItem.innerHTML = text;