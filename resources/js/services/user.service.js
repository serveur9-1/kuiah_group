import axios from 'axios';
import authHeader from './auth-header';

const API_URL = 'http://kuiah-finance.herokuapp.com/';

class UserService {


  getAdminBoard() {
    return axios.get(API_URL + 'users', { headers: authHeader() });
  }
}

export default new UserService();
