Proyecto: Let Me Cook

Este proyecto tiene como objetivo proporcionarte recetas de forma fácil, usando el mínimo de ingredientes disponibles a la mano y dándote opciones saludables, veganas y poco saludables. Siendo un chef virtual con un sin fin de recetas con el que podrás interactuar por medio de un chat en caso de que tengas algunas dudas. También contará con una gráfica que te calculará la aproximación de qué pasaría en tu cuerpo si ese alimento (Creado con la receta ) se consume más de 2 veces a la semana en 1 mes…6 meses o en un año de forma positiva o negativa .
Por ejemplo, imagina que solo tienes en tu casa ingredientes como: Masa de hojaldre vegana, Margarina vegetal, Edulcorante (Ilustración 1) , y no sabes que hacer con esos ingredientes, entonces con Let Me Cook solo bastará con ingresar esos ingredientes en nuestra página y te recomendaremos qué recetas se pueden crear de manera saludable, con pasos simplificados.

Ilustración 1
Rápidamente la página web te mostrará recetas en las cuales se utilizan estos ingredientes y serán mostradas en sus diferentes categorías como es la vegana (ilustración 4), Chatarra(ilustración 2), Balanceada(ilustración 3).

**\*\***\*\*\*\***funcionamiento del chatbot\***\*\*\*\*\
Este código es una implementación de una red neuronal básica utilizando el framework PyTorch en Python. La red neuronal está definida como una clase llamada NeuralNet que hereda de nn.Module, que es la clase base para la creación de modelos en PyTorch. La red consta de tres capas lineales (fully connected) y utiliza funciones de activación ReLU.

Voy a desglosar cómo funciona el código:

Se importan las bibliotecas necesarias, torch para PyTorch y nn (nn.Module y nn.Linear) para las operaciones de redes neuronales.

Se define la clase NeuralNet que hereda de nn.Module. Esta clase representa el modelo de red neuronal.

El método **init** es el constructor de la clase. Recibe tres argumentos:

input_size: El tamaño de entrada de la red (número de características de entrada).
hidden_size: El tamaño de las capas ocultas.
num_classes: El número de clases de salida.
Dentro del constructor, se definen tres capas lineales (nn.Linear):

self.l1: Primera capa con input_size unidades de entrada y hidden_size unidades de salida.
self.l2: Segunda capa con hidden_size unidades de entrada y hidden_size unidades de salida.
self.l3: Tercera capa con hidden_size unidades de entrada y num_classes unidades de salida.
También se crea una instancia de la función de activación ReLU (nn.ReLU) y se asigna a self.relu.

El método forward define cómo los datos se propagan a través de la red. Toma una entrada x y pasa la entrada a través de las capas y las funciones de activación.

out = self.l1(x): Propaga la entrada a través de la primera capa.
out = self.relu(out): Aplica la función ReLU a la salida de la primera capa.
out = self.l2(out): Propaga la salida de la función ReLU a través de la segunda capa.
out = self.relu(out): Aplica la función ReLU a la salida de la segunda capa.
out = self.l3(out): Propaga la salida de la segunda función ReLU a través de la tercera capa.
Finalmente, la salida de la última capa se devuelve directamente sin aplicar una función de activación adicional ni una función softmax.

Esta implementación crea una red neuronal feedforward simple con tres capas y funciones de activación ReLU entre cada par de capas.

---

---

\***\*\*\*\***como funciona train.py**\*\***\*\*\***\*\***
Este código es parte de una implementación de un chatbot simple utilizando PyTorch para el procesamiento del lenguaje natural (NLP). La idea detrás del chatbot es clasificar las intenciones de las preguntas del usuario y responder en consecuencia. La implementación incluye la preparación de datos, la construcción de un modelo de red neuronal y su entrenamiento.

Voy a desglosar cómo funciona el código:

Se importan las bibliotecas necesarias, incluyendo numpy para manipulación de matrices, json para manejo de archivos JSON, torch para PyTorch y las clases relacionadas (nn.Module, Dataset, DataLoader) para construir y entrenar la red neuronal.

Se carga el archivo JSON intents.json, que contiene los patrones de preguntas y las intenciones correspondientes.

Se realiza un preprocesamiento de los datos:

Se tokenizan las frases en palabras individuales utilizando la función tokenize.
Se construye una lista de todas las palabras únicas y se asocia cada palabra a una intención (etiqueta).
Se eliminan las palabras ignoradas ('?', '.', '!') y se aplica la técnica de stemming para reducir las palabras a su forma raíz.

Se crea un conjunto de datos de entrenamiento (X_train y y_train) donde X_train es una matriz de "bolsas de palabras" y y_train son las etiquetas de las intenciones.

Se define una clase ChatDataset que hereda de Dataset y encapsula los datos de entrenamiento.

Se crea un DataLoader (train_loader) que se encargará de cargar los datos en lotes durante el entrenamiento.

Se define un dispositivo (device) que será 'cuda' si está disponible, de lo contrario 'cpu'.

Se construye una instancia del modelo NeuralNet y se coloca en el dispositivo definido.

Se define la función de pérdida (criterion) y el optimizador (optimizer).

Se realiza el entrenamiento del modelo utilizando un bucle que recorre las épocas y los lotes de datos. En cada paso, se realiza un pase hacia adelante, se calcula la pérdida y se realiza una propagación hacia atrás para actualizar los pesos del modelo.

El código guarda el estado del modelo, el tamaño de entrada, el tamaño oculto, el tamaño de salida, las palabras únicas y las etiquetas en un archivo data.pth.

En resumen, este código carga patrones de preguntas e intenciones desde un archivo JSON, preprocesa los datos, construye y entrena un modelo de red neuronal utilizando PyTorch, y guarda los resultados del entrenamiento en un archivo para su uso posterior. Esta es una implementación simplificada de un chatbot y se espera que se complemente con lógica adicional para manejar interacciones con usuarios.

\***\*como funciona chat.py**
En resumen, este código permite a los usuarios interactuar con el chatbot ingresando mensajes y recibiendo respuestas en función de las intenciones previamente entrenadas en el modelo. Es una implementación simple de un chatbot y puede servir como base para desarrollar sistemas de diálogo más avanzados.

\***_dsd+_**

Una vez seleccionada cualquier receta, ésta te proporcionará en sencillos pasos la forma de preparar el alimento(Ilustración 6), te mostrará el total de pasos , nivel en el ranking (Ilustración 5), y con la posibilidad de que el texto sea leído por un asistente de voz por si no se quiere leer el texto, escucharlo.

Ilustración 5

Ilustración 6
Página web demo: https://letmecook.herokuapp.com/index.html
