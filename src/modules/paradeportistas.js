class paradeportistas {
	constructor() {
		this.form = document.querySelector('#paradeportistas-formulario');
		this.pais = document.querySelector('#pais');
		this.paradeporte = document.querySelector('#paradeporte');
		this.nivel = document.querySelector('#nivel');
		this.categoria = document.querySelector('#categoria');
		this.discapacidad = document.querySelector('#discapacidad');
		if ( this.form ) {
			this.events();
		}
	}

	events() {
        //Dropdowns
        this.pais.addEventListener('change', this.selectOption.bind(this));
        this.paradeporte.addEventListener('change', this.selectOption.bind(this));
        this.nivel.addEventListener('change', this.selectOption.bind(this));
        this.categoria.addEventListener('change', this.selectOption.bind(this));
		this.discapacidad.addEventListener('change', this.selectOption.bind(this));
	}

	//Methods
	selectOption(e){
		e.preventDefault();
		this.form.submit();
	}
}

export default paradeportistas;