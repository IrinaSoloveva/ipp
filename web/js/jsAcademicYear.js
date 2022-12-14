class AcademicYear {
    constructor() {
      this.containerId = "#academicYear"; 
      this.classPaginationLi = "page-item";
      this.classPaginationLiActive = "page-item active";  
      this.classPaginationA = "page-link";    
      this.nameForAttrViewYearInLi = "data-year"; 
      this.attrIdActivLi = "activeLi"; 
      this.attrIdLi = "typicalLi"; 
      this.attrPaginationLiActive = {
        "name": "aria-current",
        "attr": "page"
      };
      this.attrPaginationButtonSpan = {
        "name": "aria-hidden",
        "attr": "true"
      };
      this.attrPaginationButtonPrevious = {
        "name": "aria-label",
        "attr": "Previous",
        "label": "«",
        "href": "#"
      };  
      this.attrPaginationButtonNext = {
        "name": "aria-label",
        "attr": "Next",
        "label": "»",
        "href": "#"
      };    
      this._init();
    }

    _init() {
      this._renderClickYear();
      this._createContainer();
    };

    _createContainer() {
      let $activeYear = this._getActiveYear();
      this._createPaginationButton(this.attrPaginationButtonPrevious)
      for (let year of this._getArrayYearsView()) {
        if (year == $activeYear)
          $(this.containerId).append(this._getPaginationLiActive((year)));
        else 
          $(this.containerId).append(this._getPaginationLi('#', year));
      }      
      this._createPaginationButton(this.attrPaginationButtonNext) 
    }

    _renderClickYear() {
      $(this.containerId).on('click', this._getStringWithId(this.attrIdLi), e => {
        this._setActiveYear(e.target.getAttribute(this.nameForAttrViewYearInLi));
        location.reload();
      });
      $(this.containerId).on('click', this._getStringWithId(this.attrPaginationButtonNext.attr), e => {
        this._setNextActiveYear();
        location.reload();
      });
      $(this.containerId).on('click', this._getStringWithId(this.attrPaginationButtonPrevious.attr), e => {
        this._setPreviousActiveYear();
        location.reload();
      });
    }

    _getPaginationLiActive(label) {
      let $container = this._renderLi(this.classPaginationLiActive);
      $container.attr(this.attrPaginationLiActive.name, this.attrPaginationLiActive.attr);
      let $containerSpan = this._renderSpan(this.classPaginationA, this.attrIdActivLi).attr(this.nameForAttrViewYearInLi, label);
      $container.append($containerSpan.text(this._getStrForArrayYears(label)));
      return $container;
    }

    _getPaginationLi(href, label) {
      let $container = this._renderLi(this.classPaginationLi);
      let $containerA = this._renderA(this.classPaginationA, href, this.attrIdLi).attr(this.nameForAttrViewYearInLi, label);
      $container.append($containerA.text(this._getStrForArrayYears(label)));
      return $container;
    }

    _createPaginationButton(attributArray) {
      let $container = this._renderLi(this.classPaginationLi);
      let $appSpan = this._renderSpan('').attr(this.attrPaginationButtonSpan.name, this.attrPaginationButtonSpan.attr);
      $appSpan.text(attributArray.label);
      let $appA = this._renderA(this.classPaginationA, attributArray.href, attributArray.attr).attr(attributArray.name, attributArray.attr);
      $appA.append($appSpan);
      $(this.containerId).append($container.append($appA));
    }

    _renderLi(classLi) {
      return $('<li>', {
        class: classLi
      });
    }

    _renderSpan(classSpan, idLi = "") {
      return $('<span>', {
        class: classSpan,
        id: idLi
      });
    }

    _renderA(classA, href, idLi = "") {
      return $('<a>', {
        class: classA,
        href: href,
        id: idLi
      });
    }

    _getActiveYear() {
      if (localStorage.getItem('year')) 
        return Number(localStorage.getItem('year'));
      else
        return Number(this._getCurrentYear());     
    }

    _setActiveYear(year) {
      localStorage.setItem('year', year);
    }

    _setNextActiveYear() {
      let $activeYear = this. _getActiveYear();
      let $newActiveYear = $activeYear + 3;
      let $arr = this._getArrayAllYears();
      let $lastElemArrayYears = $arr[$arr.length - 1];
      if ($newActiveYear < $lastElemArrayYears) {
        localStorage.setItem('year', $newActiveYear);
      } else {
        localStorage.setItem('year', $lastElemArrayYears);
      }   
    }

    _setPreviousActiveYear() {
      let $activeYear = this. _getActiveYear();
      let $newActiveYear = $activeYear - 3;
      let $arr = this._getArrayAllYears();
      let $firstElemArrayYears = $arr[0];
      if ($newActiveYear > $firstElemArrayYears) {
        localStorage.setItem('year', $newActiveYear);
      } else {
        localStorage.setItem('year', $firstElemArrayYears);
      }   
    }

    _getCurrentYear() {
      let date = new Date();
      return date.getFullYear();
    }

    _getArrayAllYears() {
      let arr = [];
      for (let i = 2022; i <= this._getCurrentYear() + 20; i++) {
	      arr.push(i);
      }
      return arr;
    }  

    _getStrForArrayYears(year) {
      return `${year} - ${year + 1}`;
    }

    _getArrayYearsView() {
      return this._getArrayYearsViewForActiveIndex(this._getArrayAllYears().indexOf(this._getActiveYear()));
    }  

    _getArrayYearsViewForActiveIndex(indexActive) {
      let $arr = this._getArrayAllYears();
      let $arrView = [];
      if (indexActive === 0) {
        for (let i = 0; i < 3; i++) {
          $arrView.push($arr[i]);
        }
      }
      else if (indexActive === $arr.length - 1) {
        for (let i = $arr.length - 3; i < $arr.length; i++) {
          $arrView.push($arr[i]);
        }
      }
      else {
        for (let i = indexActive - 1; i < indexActive + 2; i++) {
          $arrView.push($arr[i]);
        }
      }
      return $arrView;
   }

   _getStringWithId(id) {
    return `#${id}`;
   }

}

window.onload = () => {
  let mygrid = new AcademicYear(); 
}