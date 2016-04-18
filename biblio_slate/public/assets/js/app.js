/*	Keila Bowers
	ASL 201604
	Biblio Slate JS
*/ 

$('#myAffix').affix({
  offset: {
    bottom: function () {
      return (this.bottom = $('.footer').outerHeight(true))
    }
  }
})
