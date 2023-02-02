class Grid {
    constructor(containerId) {
      this.containerId = containerId; 
      // Массив, состоящий из ключей, связанных с выбранными строками     
      this.arrayCheckboxKeys = [];
      this._init(containerId);
    }

    _init(containerId) {
      this.containerId = '#' + containerId;
      this._checkRowsSelect();
    };

    //check строки по клику на любой ее части
    _checkRowsSelect() {
      $(this.containerId).on('click', '.rowGrid', e => {
        let element = e.target;
        //исключаем клик по кнопкам action панели
        if (!this._clickActionButton(element)) {
          let checkbox = this._getClickCheckbox(element);
          if (checkbox.is(':checked')){
            checkbox.prop('checked', false);
          } else {
            checkbox.prop('checked', true);
          }
        }
      });
    }

    _clickActionButton(element) {
      if (this._getElementTeg(element) == 'TD') return false;
      return true;
    }

    _getElementTeg(element) {
      return $(element).prop("tagName");
    }

    _getElementTr(element) {
      return element.closest('tr');
    }

    _getKeyRow(element) {
      return this._getElementTr(element).getAttribute('data-key');
    }

    _getClickCheckbox(element) {
      let key = this._getKeyRow(element);
      return $('input[type=checkbox]').filter(function(){return this.value==key});
    }

}
