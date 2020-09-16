// axios
import axios from 'axios'

const domain = window.location.origin

export default axios.create({
  domain,
  headers: {
    'content-type': 'application/json',
    'accept'      : 'application/json'
  }
})
