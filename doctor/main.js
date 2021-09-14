const one ={
	template: '<h3>One</h3>'
}
const two ={
	template: '<h3>Two</h3>'
}
const three ={
	template: '<h3>Three</h3>'
}

const router = new VueRouter({
	routes: [
	  {
	  path: '/one',
	  component: one
	  },
	 {
	  path: '/two',
	  component: two
	 },

     {
	  path: '/three',
	  component: three
	 },

	]
})

var routTest = new Vue({
	router,
	el: '#app',
	data: {

	},
	methods: {

	}

}).$mount('#app')