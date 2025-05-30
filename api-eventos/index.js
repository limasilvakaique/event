const express = require('express');
const cors = require('cors');
const { events, rsvps } = require('./data');

const app = express();
app.use(cors());
app.use(express.json());

// GET /events – lista os eventos
app.get('/events', (req, res) => {
  res.json(events);
});

// POST /rsvp – confirmação de presença
app.post('/rsvp', (req, res) => {
  const { eventId, user } = req.body;

  if (!eventId || !user?.name || !user?.email) {
    return res.status(400).json({ message: 'Dados incompletos' });
  }

  rsvps.push({ eventId, user });
  res.status(201).json({ message: 'Presença confirmada!' });
});

// Iniciar servidor
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Servidor rodando em http://localhost:${PORT}`);
});
