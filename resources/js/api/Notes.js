import axios from 'axios';

export default {
    all() {
        return axios.get('/api/notes');
    },
    find(id) {
        return axios.get('/api/note/'+id);
    },
    update(id, data) {
        if (!id) {
            return this.create(data);
        }
        return axios.post('/api/note/'+id, data);
    },
    create(data) {
        return axios.put('/api/note/create', data);
    },
    delete(id) {
        return axios.delete('/api/note/'+id);
    },
};
