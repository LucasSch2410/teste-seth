<script setup>
</script>

<template>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>
                    Contatos
                    <RouterLink to="/contatos/criar" class="btn btn-primary float-end"> 
                        Criar Contato 
                    </RouterLink>
                </h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Endereço</th>
                            <th>Número</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(contact, index) in this.contacts" :key="index">
                            <td>{{ contact.name }}</td>
                            <td>{{ contact.email }}</td>
                            <td>{{ contact.address }}</td>
                            <td>{{ contact.phone }}</td>
                            <td class="d-flex justify-content-center gap-3">
                                <RouterLink :to="{path: '/contatos/' + contact.id + '/editar'}" class="btn btn-success">
                                    Editar
                                </RouterLink>
                                <button type="button" @click="deleteContact(contact)" class="btn btn-danger">
                                    Deletar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
import axios from 'axios'

export default {
    name: 'contacts',

    data(){
        return {
            contacts: []
        }
    },
    mounted(){
        this.getContacts()
    },
    methods: {
        getContacts(){
            axios.get('http://localhost:8000/api/contacts').then((res) => {
                this.contacts = res.data
            })
        },

        deleteContact(contact){
            if(confirm("Você quer deletar o contato " + contact.name + " ?")) {
                axios.delete(`http://localhost:8000/api/contacts/${contact.id}`)
                .then((res) => {
                    alert("Contato deletado!")

                    this.getContacts()
                })
                .catch((err) => {
                if (err.response) {
                    console.log(err.response.data)
                    console.log(err.response.status)
                    console.log(err.response.headers)
                } else if (err.request) {
                    console.log(err.request)
                } else {
                    console.log('Error', err.message)
                }

                alert("Erro interno.")
            })
            }
        }
    }
}

</script>