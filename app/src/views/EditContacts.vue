<template>


    <div class="container mt-5 d-flex flex-column">
        <div class="mb-3">

        </div>

        <div class="card">
            <div class="card-header">
                <h4>Editar contato

                    <RouterLink to="/" class="btn btn-primary float-end"> 
                        < Voltar 
                    </RouterLink>
                </h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="">Nome</label>
                    <input type="text" v-model="model.contact.name" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">E-mail</label>
                    <input type="text" v-model="model.contact.email" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Endereço</label>
                    <input type="text" v-model="model.contact.address" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Telefone</label>
                    <input type="text" v-model="model.contact.phone" class="form-control"/>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" @click="saveContact" type="button">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios'

export default {
    name: 'contactEdit',
    data(){
        return {
            contactId: null,
            model: {
                contact: {
                    name: '',
                    email: '',
                    address: '',
                    phone: ''
                }
            }
        }
    },
    mounted(){
        this.contactId = parseInt(this.$route.params.id)
        console.log(this.contactId)
        this.getContactData(this.contactId);
    },
    methods: {

        getContactData(contactId){
            axios.get(`http://localhost:8000/api/contacts/${contactId}`)
            .then((res) => {
                this.model.contact = res.data
            })
        },

        saveContact(){
            axios.put(`http://localhost:8000/api/contacts/${this.contactId}`, this.model.contact)
            .then((res) => {
                alert("Contato editado!")
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
</script>