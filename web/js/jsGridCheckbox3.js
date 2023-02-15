class Grid {
    constructor(containerId, butDeleteId) {
      // Массив, состоящий из ключей, связанных с выбранными строками     
      this.arrayCheckboxKeys = [];
      this._init(containerId, butDeleteId);
    }

    _init(containerId, butDeleteId) {
      this.containerId = '#' + containerId;
      this.butDeleteId = '#' + butDeleteId;
      this._clickDeleteBatton();
      this._checkRowsSelect();
    };

    //check строки по клику на любой ее части
    _checkRowsSelect() {
      $(this.containerId).on('click', '.rowGrid', e => {
        let element = e.target;
        //исключаем клик по кнопкам action панели
        if (!this._clickActionButton(element)) {
          let key = this._getKeyRow(element);
          let checkbox = this._getClickCheckbox(key);
          let indexArr = this._getIndexInArray(key);
          if (checkbox.is(':checked')){
            if (indexArr !== -1) this._setRemoveFromArray(indexArr);
            checkbox.prop('checked', false);
          } else {
            if (indexArr == -1) this._setAddToArray(key);
            checkbox.prop('checked', true);
          }
        }
      });
    }

    _clickDeleteBatton() {    
      $(this.butDeleteId).on('click', e => {
        let idRequest = e.target.getAttribute('data-idrequest');
        $.ajax({
          url: '/index.php?r=admin-methodical-work/delete-multiple',
          type: 'post',
          data: {
            arrayCheckboxKeys: JSON.stringify(this.arrayCheckboxKeys),
            idRequest: idRequest,
            _csrf : yii.getCsrfToken()
          },
          error: {
            function(jqxhr, status, errorMsg) {
              console.log("Статус: " + status + " Ошибка: " + errorMsg);
            }
          }
        });     
        /*  
        (async() => {
          // если выбраны записи
          if (this._getNotEmptyArray) {
            let response = await fetch('/index.php?r=admin-methodical-work/del', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json;charset=utf-8',
                '_csrf' : yii.getCsrfToken()
              },
              body: JSON.stringify(this.arrayCheckboxKeys),
            });
          
            let result = await response.json();
            alert(result.message);
          }
        })();*/
      });    
    }

    // меняет активность кнопки  (элементы не выбраны, массив пустой => кнопка неактивна)
    _setClassButton(active) {
      if (active) {
        if ($(this.butDeleteId).hasClass('disabled')) $(this.butDeleteId).removeClass('disabled');
      } else {
        if (!$(this.butDeleteId).hasClass('disabled')) $(this.butDeleteId).addClass('disabled');
      }
    }

    // true если массив не пустой
    _getNotEmptyArray() {
      return this.arrayCheckboxKeys.length > 0;
    }

    _setAddToArray(value) {
      this.arrayCheckboxKeys.push(value);
      this._setClassButton(this._getNotEmptyArray());
    }

    _setRemoveFromArray(index) {
      this.arrayCheckboxKeys.splice(index, 1);
      this._setClassButton(this._getNotEmptyArray());
    }

    _getIndexInArray(value) {
      return this.arrayCheckboxKeys.indexOf(value);
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

    _getClickCheckbox(key_element) {
      return $('input[type=checkbox]').filter(function(){return this.value==key_element});
    }

}
