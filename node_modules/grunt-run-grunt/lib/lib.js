

function pluralise(count, str) {
	return count + ' ' + str + (count === 1 ? '' : 's');
}

module.exports = {
	nub: '--> '.cyan,
	pluralise: pluralise,
	indentLog: '  |  '
};