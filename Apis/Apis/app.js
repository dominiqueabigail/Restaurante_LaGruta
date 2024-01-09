const express = require('express');
const app = express();
const cors = require('cors'); 
const port = 4000;

// Datos de las provincias
const provinciasConCiudades = {
  'Azuay': ['Cuenca', 'Gualaceo', 'Paute', 'Sigsig', 'Nabón'],
  'Bolívar': ['Guaranda', 'Chillanes', 'San Miguel', 'Chimbo', 'Caluma'],
  'Cañar': ['Azogues', 'Biblián', 'La Troncal', 'El Tambo', 'Déleg'],
  'Carchi': ['Tulcán', 'Mira', 'Espejo', 'Montúfar', 'Bolívar'],
  'Chimborazo': ['Riobamba', 'Guano', 'Pallatanga', 'Alausí', 'Cumandá'],
  'Cotopaxi': ['Latacunga', 'La Maná', 'Saquisilí', 'Pujilí', 'Salcedo'],
  'El Oro': ['Machala', 'Pasaje', 'Santa Rosa', 'Arenillas', 'Atahualpa'],
  'Esmeraldas': ['Esmeraldas', 'Atacames', 'Río Verde', 'San Lorenzo', 'Muisne'],
  'Galápagos': ['Puerto Baquerizo Moreno', 'Puerto Ayora', 'Puerto Villamil'],
  'Guayas': ['Guayaquil', 'Samborondón', 'Durán', 'Milagro', 'Daule'],
  'Imbabura': ['Ibarra', 'Otavalo', 'Cotacachi', 'Antonio Ante', 'Pimampiro'],
  'Loja': ['Loja', 'Catamayo', 'Zapotillo', 'Pindal', 'Puyango'],
  'Los Ríos': ['Babahoyo', 'Quevedo', 'Ventanas', 'Vínces', 'Palenque'],
  'Manabí': ['Portoviejo', 'Manta', 'Montecristi', 'Jaramijó', 'Santa Ana'],
  'Morona Santiago': ['Macas', 'Gualaquiza', 'Sucúa', 'Morona', 'Logroño'],
  'Napo': ['Tena', 'El Chaco', 'Quijos', 'Carlos Julio Arosemena Tola'],
  'Orellana': ['Coca', 'La Joya de los Sachas', 'Francisco de Orellana'],
  'Pastaza': ['Puyo', 'Santa Clara', 'Shell', 'Mera', 'Arajuno'],
  'Pichincha': ['Quito', 'Cayambe', 'Sangolquí', 'Machachi', 'Mejía'],
  'Santa Elena': ['Santa Elena', 'Salinas', 'La Libertad', 'La Libertad', 'Salinas'],
  'Santo Domingo de los Tsáchilas': ['Santo Domingo', 'La Concordia'],
  'Sucumbíos': ['Nueva Loja', 'Shushufindi', 'Cuyabeno', 'Gonzalo Pizarro'],
  'Tungurahua': ['Ambato', 'Tisaleo', 'Banos', 'Pelileo', 'Pillaro'],
  'Zamora Chinchipe': ['Zamora', 'Yantzaza', 'Zamora', 'Paquisha'],
  
};

app.use(cors());


// Ruta para obtener todas las provincias
app.get('/provincias', (req, res) => {
  res.json(Object.keys(provinciasConCiudades));
});

// Ruta para obtener las ciudades de una provincia específica
app.get('/provincias/:provincia', (req, res) => {
  const provincia = req.params.provincia;
  const ciudades = provinciasConCiudades[provincia] || [];
  res.json(ciudades);
});

app.listen(port, () => {
  console.log(`Servidor corriendo en el puerto ${port}`);
});
