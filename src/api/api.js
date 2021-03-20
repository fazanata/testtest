
import axios from "axios";

export default {
    axiosGetData: async function (url) {
      var data = "";
      try {
        const response = await axios.get( url );
        data = response;
      } catch (e) {
        this.errors.push(e);
      }
      return data;
    },
}