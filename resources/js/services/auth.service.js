import axios from 'axios';

const API_URL = 'https://kuiah-finance.herokuapp.com/api/v1/users/login';

class AuthService {
  login(user) {
    console.log(user.email)
    return axios
      .post(API_URL, {
        email: user.email,
        password: user.password
      })
      .then(response => {
        if (response.data.access_token) {
          localStorage.setItem('user', JSON.stringify(response.data));
        }

        return response.data;
      });
  }

  logout() {
    localStorage.removeItem('user');
  }
}

export default new AuthService();
