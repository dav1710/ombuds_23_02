function discount(n, str) {
	let result;
	let first = str.slice(0, str.indexOf(','));
	let second = str.slice(str.indexOf(', ') + 2, str.length);
	
	if(str.includes('%')){
		if(first.includes('%')) {
			first = first.slice(0, first.indexOf('%'));
			parseInt(first);
		}
		if(second.includes('%')) {
			second = second.slice(0, second.indexOf('%'));
			parseInt(second);
		}
	
		result = (n / first) / second;
	}
	else {
		result = n - first - second;
	}
	
	
	return result;
}
