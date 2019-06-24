/**
 * Gera uma cor aleátorio em hexadecimal
 * @returns {String} Cor aleátoria em hex.
 */
export function generateColor() {
  const hex = "0123456789ABCDEF";
  let color = "#";

  // Uma cor hexadecimal tem 6 letras/números.
  for (let i = 0; i < 6; i++) {
    color += hex[Math.floor(Math.random() * 16)];
  }

  return color;
}

export function uniformColor() {
  return getAllColors();
}

export function getAllColors() {
  let colors = [];

  let red = new Array("00", "33", "66", "99", "CC", "FF");
  let green = new Array("00", "33", "66", "99", "CC", "FF");
  let blue = new Array("00", "33", "66", "99", "CC", "FF");

  for (let i = 0; i < red.length; i++) {
    for (let j = 0; j < green.length; j++) {
      for (let k = 0; k < blue.length; k++) {
        let novoc = "#" + red[i] + green[j] + blue[k];
        colors.push(novoc);
      }
    }
  }

  return colors;
}
