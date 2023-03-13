import {Joueur} from './Joueur.js'
import {Pion} from './Pion.js'

const j1 = new Joueur();
const j2 = new Joueur();
const p1 = new Pion('jaune');
j1.monPion = p1;

j1.seDeplacer(12);

console.log(j1.monPion.position);
console.log(j1.monArgent);

j1.seDeplacer(5);

console.log(j1.monPion.position);
console.log(j1.monArgent);