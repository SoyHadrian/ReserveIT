import { initializeApp } from "https://www.gstatic.com/firebasejs/9.0.2/firebase-app.js";
import { getFirestore, doc, collection, query, where, getDocs } from "https://www.gstatic.com/firebasejs/9.0.2/firebase-firestore.js";
import 'firebase/firestore';

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries


const firebaseConfig = {
  apiKey: "AIzaSyB_t8cpgDZHJNEoYz7C-MFhGucNgYPcgww",
  authDomain: "reserveit-74405.firebaseapp.com",
  projectId: "reserveit-74405",
  storageBucket: "reserveit-74405.appspot.com",
  messagingSenderId: "872481683177",
  appId: "1:872481683177:web:33ab8a9ecf9ba74ee26278",
  measurementId: "G-VL8JSV0GVY"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);


const usuarioRef = collection(getFirestore(app), "usuario");
document.querySelector("form").addEventListener("submit", function(event) {
  event.preventDefault();

  var usuario = document.querySelector('input[name="usuario"]').value;
  var clave = document.querySelector('input[name="clave"]').value;

  usuarioRef.where("correo", "==", usuario).where("clave", "==", clave).get().then(function(querySnapshot) {
    if (querySnapshot.size > 0) {
      alert("Bienvenido");
      window.location.href = "RegistroUsuario.html";
    } else {
      alert("Usuario o contraseña incorrectos");
    }
  }).catch(function(error) {
    alert("Ocurrió un error al buscar en la base de datos");
    console.error(error);
  });
});
