const encoder = {
	symbols: ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', ' ', '.', ',', '—', '!'],
	shift: 10,

	messageEncoded(decodedMessage) {
		if (this.shift == 0) {
			return decodedMessage;
		}

		let sumbolsObjReverse = this.createSumbolsObjReverse(this.symbols);

		let decodedSymbols = [];
		for (let i = 0; i < decodedMessage.length; i++) {
			decodedSymbols[i] = sumbolsObjReverse[decodedMessage[i]];
		}

		let encodedMessage = '';
		for (let i = 0; i < decodedSymbols.length; i++) {
			if (decodedSymbols[i] - this.shift < 0) {
				encodedMessage += this.symbols[decodedSymbols[i] - this.shift + this.symbols.length];
			} else if (decodedSymbols[i] - this.shift >= this.symbols.length) {
				encodedMessage += this.symbols[decodedSymbols[i] - this.shift - this.symbols.length];
			} else {
				encodedMessage += this.symbols[decodedSymbols[i] - this.shift];
			}
		}

		return encodedMessage;
	},

	messageDecoded(encodedMessage) {
		if (this.shift == 0) {
			return decodedMessage;
		}

		let sumbolsObjReverse = this.createSumbolsObjReverse(this.symbols);

		let encodedSymbols = [];
		for (let i = 0; i < encodedMessage.length; i++) {
			encodedSymbols[i] = sumbolsObjReverse[encodedMessage[i]];
		}

		let decodedMessage = '';
		for (let i = 0; i < encodedSymbols.length; i++) {
			if (encodedSymbols[i] + this.shift >= this.symbols.length) {
				decodedMessage += this.symbols[encodedSymbols[i] + this.shift - this.symbols.length];
			} else if (encodedSymbols[i] + this.shift < 0) {
				decodedMessage += this.symbols[encodedSymbols[i] + this.shift + this.symbols.length];
			} else {
				decodedMessage += this.symbols[encodedSymbols[i] + this.shift];
			}
		}

		return decodedMessage;
	},

	createSumbolsObjReverse(symbols) {
		let sumbolsObj = {};
		for (let i = 0; i < symbols.length; i++) {
			sumbolsObj[symbols[i]] = i;
		}
		return sumbolsObj;
	},
}

let myWhile = true;
while (myWhile) {
	let key = prompt('Выберите действия:\n0 - Выйти из цикла\n1 - Зашифровать текст\n2 - Расшифровать текст', '0');

	switch (key) {
		case '0': {
			myWhile = false;
			break;
		}

		case '1': {
			let decodedMessage = prompt('Введите текст для зашифровки:', 'Лучше котлета в зубах, чем синица в небе.');
			let sign = prompt('Введите знак шага("+" или "-"):', "+");
			let userShift = +prompt('Введите шаг для зашифровки:', 10) % encoder.symbols.length;

			if (sign == "+") {
				encoder.shift = userShift;
			} else if (sign == "-") {
				encoder.shift = -userShift;
			}

			delete userShift;
			delete sign;

			alert(encoder.messageEncoded(decodedMessage));
			break;
		}

		case '2': {
			let encodedMessage = prompt('Введите текст для рсшифровки:', '');
			let sign = prompt('Введите знак шага("+" или "-"):', "+");
			let userShift = +prompt('Введите шаг для расшифровки:', 10) % encoder.symbols.length;

			if (sign == "+") {
				encoder.shift = userShift;
			} else if (sign == "-") {
				encoder.shift = -userShift;
			}

			delete userShift;
			delete sign;

			alert(encoder.messageDecoded(encodedMessage));
			break;
		}
	}
}