<template>
    <div class="container">
        <h3 align="center" class="mt-5">Gestão de Funcionários</h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="form-area">
                    <form @submit.prevent="save" id="check-register-form">

                        <div class="row">
                            <div class="col-md-6">
                                <label>Nome do funcionário</label>
                                <v-text-field v-model="employee.nome" label="Nome do funcionário" required>
                                </v-text-field>
                            </div>

                            <div class="col-md-6">
                                <label>Endereço do funcionário</label>
                                <v-text-field v-model="employee.endereco" label="Endereço do funcionário" required>
                                </v-text-field>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Telefone</label>
                                <v-text-field v-model="employee.tel" label="Telefone do funcionário" required>
                                </v-text-field>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">

                                <v-btn type="submit" color="success" form="check-register-form">Salvar</v-btn>


                            </div>
                        </div>
                    </form>
                </div>

                <v-table theme="light">
                    <thead>
                        <tr>
                            <th class="text-left">
                                ID-Funcinário
                            </th>
                            <th class="text-left">
                                Nome do funcionário
                            </th>

                            <th class="text-left">
                                Endereço
                            </th>

                            <th class="text-left">
                                Telefone
                            </th>
                            <th class="text-left">
                                Ação
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="employee in result" :key="employee.id">
                            <td>{{ employee.id }}</td>
                            <td>{{ employee.nome }}</td>
                            <td>{{ employee.endereco }}</td>
                            <td>{{ employee.tel }}</td>
                            <td>
                                <v-btn type="button" color="info" @click="edit(employee)">Editar</v-btn>

                                <v-btn type="button" color="danger" @click="remove(employee)">Apagar</v-btn>
                            </td>
                        </tr>
                    </tbody>
                </v-table>

            </div>
        </div>
    </div>


</template>


<script>



import axios from 'redaxios';



export default {
    name: 'Employee',
    data() {
        return {
            result: {},
            employee: {
                id: '',
                nome: '',
                endereco: '',
                tel: ''


            }
        }
    },
    created() {
        this.EmployeeLoad();
    },
    mounted() {
        console.log("mounted() called.......");

    },

    methods: {
        EmployeeLoad() {
            var page = "http://127.0.0.1:8000/api/funcionario";
            axios.get(page)
                .then(
                    ({ data }) => {
                        console.log(data);
                        this.result = data;
                    }
                );
        },


        save() {
            if (this.employee.id == '') {
                this.saveData();
            }
            else {
                this.updateData();
            }

        },
        saveData() {
            axios.post("http://127.0.0.1:8000/api/funcionario", this.funcionario)
                .then(
                    ({ data }) => {
                        this.EmployeeLoad();
                        this.employee.nome = '';
                        this.employee.endereco = '',
                            this.employee.tel = ''
                        this.id = ''
                    }
                )

        },
        edit(employee) {
            this.employee = employee;

        },
        updateData() {
            var editrecords = 'http://127.0.0.1:8000/api/funcionario/' + this.funcionario.id;
            axios.put(editrecords, this.employee)
                .then(
                    ({ data }) => {
                        this.employee.nome = '';
                        this.employee.endereco = '',
                            this.employee.tel = ''
                        this.id = ''
                        alert("Atualizado!!!");
                        this.EmployeeLoad();
                    }
                );

        },

        remove(funcionario) {

            var url = `http://127.0.0.1:8000/api/funcionario/${funcionario.id}`;


            axios.delete(url);
            alert("Deletado");
            this.EmployeeLoad();
        }
    }
}
</script>

<style scoped>
.form-area {
    padding: 20px;
    margin-top: 20px;
    background-color: #f8f4f4;
    color: #080808;
}

.bi-trash-fill {
    color: rgb(247, 51, 51);
    font-size: 18px;
}

.bi-pencil {
    color: green;
    font-size: 18px;
    margin-left: 20px;
}
</style>