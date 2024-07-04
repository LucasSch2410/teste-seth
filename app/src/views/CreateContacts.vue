<template>


    <div class="container mt-5 d-flex flex-column">
        <div class="mb-3">

        </div>

        <div class="card">
            <div class="card-header">
                <h4>Criar contato

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
    name: 'contactCreate',
    data(){
        return {
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
    methods: {
        saveContact(){
            axios.post('http://localhost:8000/api/contacts', this.model.contact)
            .then((res) => {
                alert("Contato criado!")
            })
            .catch((err) => {
                if (error.response) {
                    console.log(error.response.data)
                    console.log(error.response.status)
                    console.log(error.response.headers)
                } else if (error.request) {
                    console.log(error.request)
                } else {
                    console.log('Error', error.message)
                }

                alert("Erro interno.")
            })
        }
    }
}
</script>