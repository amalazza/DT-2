import Axios from "axios"

export const anggota = {
    namespaced: true,
    state:{
        anggotas : [],
        anggota: {},
        AnggotaView : {},
    },
    getters: {
        anggotaList(state){
            return state.anggotas;
        },
        singleAnggota(state){
            return state.anggota;
        },
        AnggotaView(state){
            return state.AnggotaView;
        }
    },
    actions: {
        anggotaList(context, payload){
            return Axios.get('/api/admin/anggotas/?page='+payload, )
            .then((result) => {
                context.commit('anggotaList', result.data);

            }).catch((err) => {

            });
        },
        AnggotaView(context, payload){
            Axios.get(`/api/admin/anggotas/${payload}`)
            .then(res=>{
                context.commit('AnggotaView', res.data)
            })
        },
        editAnggota(context, payload){
            Axios.get(`/api/admin/anggotas/${payload}`)
            .then(res=>{
                context.commit('singleAnggota', res.data)
            })
        },
    },
    mutations: {
        anggotaList(state, payload){
            return state.anggotas = payload;
        },
        singleAnggota(state, payload){
            return state.anggota = payload;
        },
        AnggotaView(state, payload){
            return state.AnggotaView = payload;
        }
    }
}