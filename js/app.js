// JavaScript Document
const { createApp } = Vue;

createApp({
  data() {
    return {
      usuarios: [],
      mostrarFormulario: false,
      editando: false,
      form: {
		  name: '',
		  email: '',
		  age: '',
		  favorite_language: ''
		}
    }
  },

  mounted() {
    this.cargarDatos();
  },

  methods: {

    cargarDatos() {
      fetch("api/getCustomers.php")
        .then(res => res.json())
        .then(data => this.usuarios = data);
    },

    guardar() {
      let url = this.editando
        ? "api/updateCustomer.php"
        : "api/insertCustomer.php";

      fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(this.form)
      })
      .then(() => {
        this.cargarDatos();
        this.cancelar();
      });
    },

    editar(user) {
      this.form = { ...user };
      this.editando = true;
      this.mostrarFormulario = true;
    },

    eliminar(id) {
      fetch("api/deleteCustomer.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id })
      })
      .then(() => this.cargarDatos());
    },

    cancelar() {
      this.form = { id: null, name:'', email:'', age:'', favorite_language:'' };
      this.editando = false;
      this.mostrarFormulario = false;
    }

  }

}).mount("#app");
