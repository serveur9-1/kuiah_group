import axios from 'axios';
import authHeader from './auth-header';

const API_URL = 'https://kuiah-finance.herokuapp.com/api/v1/';

class UserService {


  getAdminBoard() {
    return axios.get(API_URL + 'users', { headers: authHeader() });
  }
}

export default new UserService();
