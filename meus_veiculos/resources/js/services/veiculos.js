import { http } from "./config";

class ListsDataService {
    getAll() {
      return http.get(`/veiculos`);
    }
    get(id) {
      return http.get(`/veiculo/${id}`);
    }
    getSimulation(valores) {
      return http.post(`/simulacao`,valores);
    }
  }
export default new ListsDataService();