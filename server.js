import express from "express";
import cors from "cors";

const app = express();

app.use(cors());
app.use(express.json());

const PORT = process.env.PORT || 3000;

app.post("/preguntar", async (req, res) => {
  try {
    const { mensaje } = req.body;

    const response = await fetch("https://openrouter.ai/api/v1/chat/completions", {
      method: "POST",
      headers: {
        "Authorization": `Bearer ${process.env.API_KEY}`,
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        model: "openai/gpt-3.5-turbo",
        messages: [
          {
            role: "system",
            content: "Eres un chef experto. Responde con recetas claras, ingredientes y pasos."
          },
          {
            role: "user",
            content: mensaje
          }
        ]
      })
    });

    const data = await response.json();

    const text = data?.choices?.[0]?.message?.content || "Sin respuesta";

    res.json({ respuesta: text });

  } catch (error) {
    console.error(error);
    res.json({ error: error.message });
  }
});

app.listen(PORT, () => {
  console.log("Servidor corriendo");
});
