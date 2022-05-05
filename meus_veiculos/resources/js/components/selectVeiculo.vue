<template>
  <div class="containerSelect">
    <select class="form-select" v-model="selectId" @change="infosVeiculo()">
      <option class="selecione" value="">Selecione</option>
      <option v-for="veiculo in veiculos" :value="veiculo.id" :key="veiculo.id">
        {{ veiculo.description }}
      </option>
    </select>
    <div v-if="selectId != ''" class="infosVeiculo">
      <h3>> {{descriptionInfo}}</h3>
      <h3>> R$ {{valueInfo | formataValor}}</h3>
    </div>
    <div class="divSolicitaSimulacao" v-if="selectId != ''">
        <h2 class="simulacaoTitle">Simulação de Financiamento</h2>
        <div class="digiteEntrada">
          <label>Digite o valor de entrada:</label>
        </div>
        <div class="input-group mb-3">
          <input name="valor" style="display:none;" :value="valueInfo">
          <money name="valorEntrada" class="form-control" aria-placeholder="Valor de entrada" v-bind="money" placeholder="Informe o valor" aria-label="Informe o valor" aria-describedby="basic-addon2" v-model="valorSimulado"></money>
          <div class="input-group-append">
            <button class="btn btn-outline-secondary btnSimular" type="submit" @click="simulacaoVeiculo()">Simular</button>
          </div>
        </div>
    </div>
    <div v-if="parcela_6 != ''">
      <div class="divTitleSimulacao">
        <h2 class="h2titleSimulacao">Valores simulados para você</h2>
      </div>
      <div class="valoresSimulados">
        <h4 class="simulacao_48">48x de R$ {{parcela_48 | formataValor}}</h4>
        <h4 class="simulacao_12">12x de R$ {{parcela_12 | formataValor}}</h4>
        <h4 class="simulacao_6">6x de R$ {{parcela_6 | formataValor}}</h4>
      </div>
    </div>
  </div>
</template>

<script>
import ListsDataService from "../services/veiculos";
export default {
    name: "listsExpends",
    data() {
      return {
        veiculos: {
            id: '',
            description: ''
        },
        selectId: '',
        descriptionInfo: '',
        valueInfo: '',
        valorSimulado: '',
        parcela_6: '',
        parcela_12: '',
        parcela_48: '',
        money: {
            decimal: ',',
            thousands: '.',
            prefix: 'R$ ',
            suffix: '',
            precision: 2,
            masked: false,
            maxlength: 18
        },
      };
  },
  methods: {
    retrieveLists() {
      ListsDataService.getAll()
      .then(response => {
          var veiculos = response.data;
          this.veiculos = veiculos;
      }).catch(e => {
          console.log(e);
      });
    },
    infosVeiculo(){
      this.valorSimulado = '';
      this.parcela_6 = '';
      ListsDataService.get(this.selectId)
      .then(response => {
          var veiculoInfo = response.data[0];
          this.descriptionInfo = veiculoInfo.description;
          this.valueInfo = veiculoInfo.value;
      }).catch(e => {
          console.log(e);
      });
    },
    simulacaoVeiculo(){
      if(this.valorSimulado != ''){
        if(this.valorSimulado < this.valueInfo){
          if(Math.sign(this.valorSimulado) == 1){
            ListsDataService.getSimulation({valor: this.valueInfo, valorSimulado: this.valorSimulado})
            .then(response => {
                var valores = response.data;
                this.parcela_6 = valores.numeroParcela_6;
                this.parcela_12 = valores.numeroParcela_12;
                this.parcela_48 = valores.numeroParcela_48;
            }).catch(e => {
                console.log(e);
            });
          }else{
            alert('O valor inserido deve ser positivo');
          }
        }else{
          alert("O valor inserido deve ser menor que o do veículo");
        }
       }else{
        alert("Coloque o valor de entrada");
      }
    }
  },
  mounted() {
      this.retrieveLists();
  }
}
</script>

<style scoped>
</style>