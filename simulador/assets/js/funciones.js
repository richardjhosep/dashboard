'use strict';
/* -----------------------------
	LOZAD
----------------------------- */

function _createForOfIteratorHelper(o, allowArrayLike) {
  var it;

  if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) {
    if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") {
      if (it) {
        o = it;
      }

      var i = 0;

      var F = function F() {};

      return {
        s: F,
        n: function n() {
          if (i >= o.length) {
            return {
              done: true
            };
          }

          return {
            done: false,
            value: o[i++]
          };
        },
        e: function e(_e) {
          throw _e;
        },
        f: F
      };
    }

    throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
  }

  var normalCompletion = true,
    didErr = false,
    err;
  return {
    s: function s() {
      it = o[Symbol.iterator]();
    },
    n: function n() {
      var step = it.next();
      normalCompletion = step.done;
      return step;
    },
    e: function e(_e2) {
      didErr = true;
      err = _e2;
    },
    f: function f() {
      try {
        if (!normalCompletion && it["return"] != null) {
          it["return"]();
        }
      } finally {
        if (didErr) {
          throw err;
        }
      }
    }
  };
}

function _unsupportedIterableToArray(o, minLen) {
  if (!o) {
    return;
  }

  if (typeof o === "string") {
    return _arrayLikeToArray(o, minLen);
  }

  var n = Object.prototype.toString.call(o).slice(8, -1);

  if (n === "Object" && o.constructor) {
    n = o.constructor.name;
  }

  if (n === "Map" || n === "Set") {
    return Array.from(o);
  }

  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) {
    return _arrayLikeToArray(o, minLen);
  }
}

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) {
    len = arr.length;
  }

  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }

  return arr2;
}

var observer = lozad('.lozad', {
  loaded: function loaded(el) {
    // Custom implementation on a loaded element
    $(el).addClass('loaded');
  }
});
observer.observe();
/* -----------------------------
	BOTON SUBIR
----------------------------- */

fln.scrolling(function() {
  _scroll = $(document).scrollTop();

  if (_scroll > _height / 2) {
    $('.btn-subir').addClass('btn-subir--activo');
  } else $('.btn-subir').removeClass('btn-subir--activo');
});
$('.btn-subir').click(function() {
  fln.scroll_to('body', 0, 1000);
});
/* -----------------------------
	VALIDACIONES INPUTS
----------------------------- */

var disableKeydownRepeat = function disableKeydownRepeat(selector, callback) {
  selector = document.querySelectorAll(selector);
  var _iteratorNormalCompletion = true;
  var _didIteratorError = false;
  var _iteratorError = undefined;

  try {
    for (var _iterator = selector[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
      var input = _step.value;
      input.addEventListener('keydown', function(event) {
        if (event.repeat && event.key !== 'Backspace') {
          event.preventDefault();
        }

        if (typeof callback === 'function') {
          callback();
        }
      });
    }
  } catch (err) {
    _didIteratorError = true;
    _iteratorError = err;
  } finally {
    try {
      if (!_iteratorNormalCompletion && _iterator["return"] != null) {
        _iterator["return"]();
      }
    } finally {
      if (_didIteratorError) {
        throw _iteratorError;
      }
    }
  }
};

var RUT = {
  selector: '.rut',
  keys: [8, 9, 46, 16, 37, 39],
  limpiar: function limpiar(rut) {
    return rut.replace(/^0+|[^0-9kK]+/g, '').toUpperCase();
  },
  formatear: function formatear(rut) {
    rut = this.limpiar(rut);
    var result = rut.slice(-4, -1) + '-' + rut.substr(rut.length - 1);

    for (var i = 4; i < rut.length; i += 3) {
      result = rut.slice(-3 - i, -i) + '.' + result;
    }

    return result;
  },
  validar: function validar(rut) {
    if (typeof rut !== 'string') {
      return false;
    }

    if (!/^0*(\d{1,3}(\.?\d{3})*)-?([\dkK])$/.test(rut)) {
      return false;
    }

    rut = this.limpiar(rut);
    var t = parseInt(rut.slice(0, -1), 10);
    var m = 0;
    var s = 1;

    while (t > 0) {
      s = (s + t % 10 * (9 - m++ % 6)) % 11;
      t = Math.floor(t / 10);
    }

    var v = s > 0 ? '' + (s - 1) : 'K';
    return v === rut.slice(-1);
  },
  aplicar: function aplicar() {
    var _this = this;

    disableKeydownRepeat(this.selector);
    this.selector2 = document.querySelectorAll(this.selector);

    var _iterator2 = _createForOfIteratorHelper(this.selector2),
      _step2;

    try {
      var _loop = function _loop() {
        var input = _step2.value;
        input.setAttribute('maxlength', 12);
        input.addEventListener('keydown', function(event) {
          // console.log(event.keyCode);
          if (!/[kK0-9\-]/.test(event.key) && _this.keys.indexOf(event.keyCode) < 0) {
            event.preventDefault();
          }

          _this.limpiar(input.value);
        });
        input.addEventListener('keyup', function(event) {
          input.value = input.value.length > 1 ? _this.formatear(input.value) : input.value;
        });
        input.addEventListener('blur', function(event) {
          setTimeout(function() {
            if (_this.validar(input.value)) {
              input.classList.remove('invalido');
              input.classList.add('valido');
            } else {
              input.classList.remove('valido');
              input.classList.add('invalido');
            }
          }, 10);
        });
      };

      for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
        _loop();
      }
    } catch (err) {
      _iterator2.e(err);
    } finally {
      _iterator2.f();
    }
  }
};
RUT.aplicar();

var validarTelefono = function validarTelefono() {
  var _inputs = document.querySelectorAll('.tipo_fono');

  if (_inputs.length) {
    var _clearValidar;

    var _a = _inputs;

    var _f = function _f(el, i) {
      var _dataPrefijo = el.getAttribute('data-prefijo');

      var _dataPrefijoTipo = el.getAttribute('data-prefijo-tipo');

      var _pattern;

      if (_dataPrefijoTipo === 'celular') {
        _pattern = /^(\+?56)?(\s?)(0?9)(\s?)[9876543]\d{7}$/;
      } else if (_dataPrefijoTipo === 'fijo') {
        _pattern = /\D*([+56]\d[2-9])(\d{4})(\d{4})\D*/;
      }

      fln.multipleEventsListeners(el, 'keyup blur paste', function(event) {
        var _val = el.value;

        var _patron = _pattern.test(_val);

        clearTimeout(_clearValidar);
        _clearValidar = setTimeout(function() {
          if (_patron) {
            el.classList.remove('invalido');
            el.classList.add('valido');
          } else {
            el.classList.add('invalido');
            el.classList.remove('valido');
          }
        });
      });
      fln.multipleEventsListeners(el, 'focus paste', function(event) {
        var _val = el.value;

        if (_dataPrefijo && !el.value) {
          el.value = _dataPrefijo;
        } else if (el.value) {
          el.value = _val;
        } else {
          el.value = '';
        }
      });
      el.addEventListener('blur', function(event) {
        var _val = el.value;

        if (_dataPrefijo && el.value === _dataPrefijo) {
          el.value = '';
          setTimeout(function() {
            $(el).blur().next().removeClass('focus');
          }, 10);
        } else {
          el.value = _val;
        }
      });
    };

    for (var _i = 0; _i < _a.length; _i++) {
      _f(_a[_i], _i, _a);
    }

    undefined;
  }
};

validarTelefono();
/* -----------------------------
	TOOLTIPS
----------------------------- */

tippy('[data-tippy-content]');
/* -----------------------------
	CALENDARIO
----------------------------- */

var CALENDARIO = function CALENDARIO() {
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '< Ant',
    nextText: 'Sig >',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: '',
    yearRange: '-100:+0'
  };
  $.datepicker.setDefaults($.datepicker.regional['es']);
  $('.calendario.estandar').each(function(i, el) {
    var calendario = $(el);
    var maxDate = $(el).data('max');
    var minDate = $(el).data('min');
    var yearRange = $(el).data('year-range');

    var validDate = function validDate(e) {
      var actual = e.split('/');
      var date = ''.concat(actual[1], '/').concat(actual[0], '/').concat(actual[2]);
      return date;
    };

    if (el.value) {
      el.setAttribute('data-valid-date', new Date(validDate(el.value)));
    }

    $(el).datepicker({
      container: $(el),
      changeYear: true,
      minDate: minDate,
      maxDate: maxDate,
      yearRange: '-100:+0',
      nextText: '<span class="fln-derecha" title="Mes siguiente"></span>',
      prevText: '<span class="fln-izquierda" title="Mes anterior"></span>',
      beforeShow: function beforeShow() {
        el.value = el.value ? el.value : " ";
        setTimeout(function() {
          $('.ui-datepicker').css('z-index', 999);
        }, 0);
      },
      onSelect: function onSelect(e) {
        el.value = e;
        el.setAttribute('data-valid-date', new Date(validDate(e)));
        setTimeout(function() {
          $(el).blur().change().removeClass('invalido').addClass('valido');
        }, 100);
        setTimeout(function() {
          $('.js-nacimiento').find("label").addClass('focus');
        }, 1);
      }
    });
  });
};

CALENDARIO();
/* -----------------------------
	VARIOS
----------------------------- */

window.onload = function() {
  $('#long-check').find('.form__checkbox__item').addClass('long-check');
  setTimeout(function() {
    $('.btn--secundario').removeAttr('disabled');
  }, 10);
  setTimeout(function() {
    $('.form__grupo--select select option').each(function() {
      var $this = $(this);

      if ($this.attr('selected') !== undefined) {
        $('.form__grupo--select').find('label').addClass('focus');
      } else {
        return false;
      }
    });
  }, 10);
};

$('.form__checkbox').each(function() {
  $(this).on('click', function() {
    if ($(this).hasClass('form__checkbox--checked')) {
      $(this).removeClass('form__checkbox--checked');
      $(this).find('input').prop('checked', false).removeAttr('checked');
    } else {
      $(this).closest('.representante').removeClass('invalido');
      $(this).addClass('form__checkbox--checked');
      $(this).find('input').prop('checked', true).attr('checked', 'checked');
    }
  });
});
$("textarea[name='ingreso-forma-actuar[]']").attr('maxlength', '150');

function validate() {
  $('.pasos__cedula input[type=file]').each(function() {
    var files = $(this).val();

    if (files == '') {
      $('#errores_imagenes').slideDown();
      setTimeout(function() {
        $('#errores_imagenes').slideUp();
      }, 5000);
    }
  });
}

function removerFocus() {
  $("input.tipo_fono").each(function(i, el) {
    var _input = $(this);

    var _val = _input.val();

    if (_val == '') {
      _input.parent().find('label').removeClass('focus');
    }
  });
}

function removerSelectFocus() {
  $("select[name='forma-actuar[]']").each(function() {
    var _select = $(this);

    var _valselect = _select.val();

    var _selectPadre = $(this).parent().parent();

    _select.val('');

    if (_valselect == '') {
      _select.parent().find('label').removeClass('focus');

      _selectPadre.find('.grupo-extra').css('display', 'none').addClass('form__grupo--hidden');
    }

    if (_valselect == 'otra') {
      _selectPadre.find('.grupo-extra').removeClass('form__grupo--hidden').fadeIn().css('display', 'flex');
    }
  });
}

function minVal() {
  $('.form__grupo--cuenta').each(function(i, el) {
    $(el).find('input[type=text]').each(function(i2, el2) {
      if (el2.value.length >= 6) {
        $(el2).removeClass('invalido').addClass('valido');
        return;
      } else {
        $(el2).removeClass('valido').addClass('invalido');
      }
    });
  });
}
/* -----------------------------
	SELECT CON AYUDA
----------------------------- */


function showAdicional() {
  var adicionalPadre = $('.form__grupo');
  adicionalPadre.find("select[name='forma-actuar[]']").each(function(i, el) {
    $(el).change(function() {
      if ($(el).val()) {
        $(el).find('.form__adicional--paso2').hide();
      }

      if ($(el).val() == 'otra') {
        $(el).parent().parent().find('.grupo-extra').removeClass('form__grupo--hidden').fadeIn().css('display', 'flex');
      } else {
        $(el).parent().parent().find('.grupo-extra').addClass('form__grupo--hidden').fadeOut();
      }
    });
  });
}
/* -----------------------------
	REMOVER AYUDA CAMPO RUT
----------------------------- */


var rutPersona = function rutPersona() {
  var rut = $("input[name='rut[]']").val();

  if (rut.length > 11) {
    $('.rut-help-persona').addClass('hide');
  } else {
    $('.rut-help-persona').removeClass('hide');
  }
};

var rutSociedad = function rutSociedad() {
  var rut = $("input[name='rut-sociedad[]']").val();

  if (rut.length > 11) {
    $('.rut-help-sociedad').addClass('hide');
  } else {
    $('.rut-help-sociedad').removeClass('hide');
  }
};
/* -----------------------------
	FORMULARIOS - PASOS
----------------------------- */


var validarPasoPrevio = function validarPasoPrevio() {
  validarFormulario('form-previo', {
    texto: 'Debe ingresar ',
    exito: function exito() {
      if (!validarPass()) {
        return;
      }

      event.preventDefault();
      $('.submit').attr('disabled', true);
      $('#form-previo').submit();
    }
  });
};

var validarPaso1 = function validarPaso1() {
  validarFormulario('form-paso1', {
    texto: 'Debe ingresar ',
    exito: function exito() {
      event.preventDefault();
      $('.submit').attr('disabled', true);
      $('#form-paso1').submit();
    }
  });
};

var validarPaso2 = function validarPaso2() {
  validarFormulario('form-paso2', {
    texto: 'Debe ingresar ',
    exito: function exito() {
      event.preventDefault();
      $('.submit').attr('disabled', true);
      $('#form-paso2').submit();
    },
    error: function error() {
      if (toFormularios) {
        clearTimeout(toFormularios);
      }

      $("#errores_form-paso2").html('Por favor, revise todos los campos requeridos').slideDown('fast');
      toFormularios = setTimeout(function() {
        $("#errores_form-paso2").slideUp('fast');
      }, 5000);
      validarBloques();
    }
  });
};

var validarPaso3 = function validarPaso3() {
  var checked = $('.form__checkbox--checked input');
  var otrosCampos = [];
  $('.representante').each(function(i, el) {
    var valido = false;
    $(el).find('input[type=checkbox]').each(function(i2, el2) {
      if (el2.checked) {
        valido = true;
        return;
      }
    });

    if (!valido) {
      otrosCampos['representante legal ' + (i + 1)] = [false, el];
    } else {
      otrosCampos['representante legal ' + (i + 1)] = [true, el];
    }
  });
  validarFormulario('form-paso3', {
    texto: 'Debe seleccionar, al menos, una opción para ',
    otrosCampos: otrosCampos,
    exito: function exito() {
      event.preventDefault();
      $('.submit').attr('disabled', true);
      $('#form-paso3').submit();
    }
  });
};

var validarPaso4 = function validarPaso4() {
  validarFormulario('form-paso4', {
    texto: 'Debe ingresar ',
    exito: function exito() {
      event.preventDefault();
      $('.submit').attr('disabled', true);
      $('#form-paso4').submit();
    },
    error: function error() {
      if (toFormularios) {
        clearTimeout(toFormularios);
      }

      $("#errores_form-paso4").html('Por favor, revise todos los campos').slideDown('fast');
      toFormularios = setTimeout(function() {
        $("#errores_form-paso4").slideUp('fast');
      }, 5000);
      validarBloques();
    }
  });
};

function selectPaso5() {
  $('.form__grupo').each(function(i, el) {
    var valido = false;
    $(el).find("select").each(function(i2, el2) {
      if (el2.value != '') {
        valido = true;
        return;
      }
    });

    if (!valido) {
      $(el).find('select').addClass('invalido');
    } else {
      $(el).find('select').removeClass('invalido').addClass('valido');
    }
  });
}

var validarPaso5 = function validarPaso5() {
  selectPaso5();
  validarFormulario('form-paso5', {
    texto: 'Debe ingresar ',
    exito: function exito() {
      event.preventDefault();
      $('.submit').attr('disabled', true);
      $('#form-paso5').submit();
    },
    error: function error() {
      if (toFormularios) {
        clearTimeout(toFormularios);
      }

      $("#errores_form-paso5").html('Por favor, revise todos los campos').slideDown('fast');
      toFormularios = setTimeout(function() {
        $("#errores_form-paso5").slideUp('fast');
      }, 5000);
      validarBloques();
    }
  });
};

var validarPaso6 = function validarPaso6() {
  var otrosCampos = [];
  $('.representante').each(function(i, el) {
    var valido = true;
    $(el).find('input[type=file]').each(function(i2, el2) {
      if (!el2.value) {
        valido = false;
        return;
      }
    });

    if (!valido) {
      otrosCampos['representante legal ' + (i + 1)] = [false, el];
    }
  });
  validarFormulario('form-paso6', {
    texto: 'Debe subir ambas imágenes para ',
    otrosCampos: otrosCampos,
    exito: function exito() {
      event.preventDefault();
      $('.submit').attr('disabled', true);
      $('#form-paso6').submit();
    }
  });
};

var validarPaso7 = function validarPaso7() {
  var otrosCampos = [];
  $('.subir-doc').each(function(i, el) {
    var valido = true;
    $(el).find('input[type=file].requerido').each(function(i2, el2) {
      if (!el2.value) {
        valido = false;
        return;
      }
    });

    if (!valido) {
      otrosCampos[$(el).find('p').html()] = [false, $(el).find('.btn--neutro')];
    }
  });
  validarFormulario('form-paso7', {
    texto: 'Debe ingresar ',
    otrosCampos: otrosCampos,
    exito: function exito() {
      event.preventDefault();
      $('.submit').attr('disabled', true);
      $('#form-paso7').submit();
    },
    error: function error() {
      if (toFormularios) {
        clearTimeout(toFormularios);
      }

      $("#errores_form-paso7").html('Por favor, revise todos los campos requeridos').slideDown('fast');
      toFormularios = setTimeout(function() {
        $("#errores_form-paso7").slideUp('fast');
      }, 5000);
      validarBloques();
    }
  });
};
/* -----------------------------
	VALIDACION SUBIR IMG PASO 7
----------------------------- */


function subirImagen(input) {
  var file = $(input).get(0).files[0];
  var boton = $(input).closest('.pasos__contenedor').find('a');
  var imagen = $(input).closest('.pasos__contenedor').find('.pasos__imgcedula__interior').find('img');
  var error = $(input).closest('.pasos__contenedor').find('.error');
  var pdf = $(input).closest('.pasos__contenedor').find('.pdf-view');
  var cajaImagen = $(input).closest('.pasos__contenedor').find('.pasos__imgcedula');

  if (cajaImagen.length) {
    if (!imagen[0].srcOriginal) {
      imagen[0].srcOriginal = imagen.attr('src');
    }
  }

  if (file.size < 40 * 1024 * 1024) {
    var ext = file.name.split('.').pop().toLowerCase();

    if ($.inArray(ext, ['jpg', 'jpeg', 'pdf', 'png']) >= 0) {
      //valido
      if (cajaImagen.length) {
        resetImagen(input);

        if (ext == "pdf") {
          $(imagen).hide();
          $(pdf).addClass('vista-pdf');
          $(pdf).find('.pdf-name').html(file.name);
          $(pdf).fadeIn(500);
        } else {
          var reader = new FileReader();

          reader.onload = function(e) {
            imagen.hide();
            imagen.attr("src", e.target.result);
            imagen.fadeIn(500);
          };

          reader.readAsDataURL(file);
        }
      }

      boton.addClass('loaded').removeClass('invalido');
      error.slideUp();
    } else {
      boton.removeClass('loaded').addClass('invalido');
      error.html("Los tipos de archivos aceptados son jpg, png y pdf").slideDown();

      if (cajaImagen.length) {
        resetImagen(input);
      }
    }
  } else {
    boton.removeClass('loaded').addClass('invalido');
    error.html("Tamaño máximo de 40mb").slideDown();

    if (cajaImagen.length) {
      resetImagen(input);
    }
  }
}

function resetImagen(input) {
  var imagen = $(input).parent().parent().find('.pasos__imgcedula__interior').find('img');
  var pdf = $(input).closest('.pasos__contenedor').find('.pdf-view');
  imagen.hide();
  imagen.attr("src", imagen[0].srcOriginal);
  imagen.fadeIn(500);
  $(pdf).hide();
  $(pdf).find('.pdf-name').html('');
  $(pdf).removeClass('vista-pdf');
}
/* -----------------------------
	PASSWORD PASO PREVIO
----------------------------- */


var validarPass = function validarPass() {
  var valido = true;
  var password = $('#password').val();
  aplicarClases($('#re-password'), '');

  if ($('#password').val() != $('#re-password').val()) {
    valido = false;
    aplicarClases($('#re-password'), 'invalido');
  }

  if (!$('#password').val()) {
    aplicarClases($('#password'), '');
  }

  return valido;
};

var validarRepetirPass = function validarRepetirPass() {
  aplicarClases($('#re-password'), '');

  if ($('#re-password').val() != $('#password').val()) {
    aplicarClases($('#re-password'), 'invalido');
    $('#errores_pass').slideDown();
  } else {
    $('#errores_pass').slideUp();
  }

  if (!$('#re-password').val()) {
    aplicarClases($('#re-password'), '');
    $('#errores_pass').slideUp();
  }
};

function mostrarPass() {
  var showpass = document.getElementById('password');

  if (showpass.type === 'password') {
    showpass.type = 'text';
  } else {
    showpass.type = 'password';
  }
}

function mostrarNuevoPass() {
  var shownuevopass = document.getElementById('re-password');

  if (shownuevopass.type === 'password') {
    shownuevopass.type = 'text';
  } else {
    shownuevopass.type = 'password';
  }
}
/* -----------------------------
	LIGHTBOXS INICIO
----------------------------- */


$('.popup-with-move-anim').magnificPopup({
  type: 'inline',
  alignTop: false,
  fixedContentPos: false,
  fixedBgPos: true,
  overflowY: 'auto',
  closeBtnInside: true,
  preloader: false,
  midClick: true,
  removalDelay: 300,
  mainClass: 'my-mfp-slide-bottom'
});
/* -----------------------------
	AUTOCOMPLETAR CAMPOS ON KEYUP RUT
----------------------------- */

function autocompletarRut(input, id_contenedor) {
  var value = input.value;

  if (value.length) {
    setTimeout(function() {
      if ($(input).hasClass('valido')) {
        $.get("ajax/autocompletar_rut.php?rut=" + rut, function(data) {
          if ($("#" + id_contenedor).find("[name='nombres[]']").length && typeof data.nombres != 'undefined') {
            $("#" + id_contenedor).find("[name='nombres[]']").val(data.nombres).focus();
          }

          if ($("#" + id_contenedor).find("[name='apellido-paterno[]']").length && typeof data.apellido_paterno != 'undefined') {
            $("#" + id_contenedor).find("[name='apellido-paterno[]']").val(data.apellido_paterno).focus();
          }

          if ($("#" + id_contenedor).find("[name='apellido-materno[]']").length && typeof data.apellido_materno != 'undefined') {
            $("#" + id_contenedor).find("[name='apellido-materno[]']").val(data.apellido_materno).focus();
          }

          if ($("#" + id_contenedor).find("[name='email[]']").length && typeof data.email != 'undefined') {
            $("#" + id_contenedor).find("[name='email[]']").val(data.email).focus();
          } // if ($("#" + id_contenedor).find("[name=telefono-fijo]").length && typeof data.telefono_fijo != 'undefined') {
          // $("#" + id_contenedor).find("[name=telefono-fijo]").val(data.telefono_fijo).focus();
          // }
          // if ($("#" + id_contenedor).find("[name=telefono-movil]").length && typeof data.telefono_movil != 'undefined') {
          // $("#" + id_contenedor).find("[name=telefono-movil]").val(data.telefono_movil).focus();
          // }


          $("#" + id_contenedor).find("[name='nombres[]']").focus();
          completarDatosCabecera($('#' + id_contenedor));
        });
      }
    }, 100);
  }
}
/* -----------------------------
	DESPLEGABLES
----------------------------- */


$('.desplegable__borrar').click(function() {
  $(this).closest('.desplegable__contenedor').remove();
});
$('input[type=select]').change(function() {
  if ($('input[type=select] option:selected').val() != '') {
    $('input[type=select] option:selected').attr('selected', 'selected');
  }
});

function completarDatosCabecera(bloque) {
  if ($('.representante_nombre').length) {
    $(bloque).find('.representante_nombre').text($(bloque).find("[name='nombres[]']").val());
  }

  if ($('.representante_rut').length) {
    $(bloque).find('.representante_rut').text($(bloque).find("[name='rut[]']").val());
  }

  if ($('.representante_banco').length) {
    $(bloque).find('.representante_banco').text($(bloque).find('.select-banco option:selected').val());
  }

  if ($('.representante_tipo').length) {
    $(bloque).find('.representante_tipo').text($(bloque).find('.select-cuenta option:selected').val());
  }
}

function ocultarBloques(bloque) {
  if (typeof bloque == "undefined") {
    bloque = "";
  }

  $('.bloque_desplegable').each(function(i, el) {
    if (bloque[0] != $(el)[0]) {
      $(el).removeClass('activo');
      $(el).find('.contenido').slideUp();
    }
  });
}

function validarBloques() {
  $('.bloque_desplegable').each(function(i, el) {
    var valido = true;
    $(el).removeClass('invalido');
    $(el).find(".requerido").each(function(i2, input) {
      if ($(input).hasClass('invalido')) {
        valido = false;
        return;
      } else {
        $(el).removeClass('invalido');
      }
    });

    if (!valido) {
      $(el).addClass('invalido');
    } else {
      $(el).removeClass('invalido');
    }
  });
}

function mostrarBloque(bloque, forzar) {
  if (typeof forzar == "undefined") {
    forzar = false;
  }

  if (!$(bloque).hasClass('activo') || forzar) {
    ocultarBloques(bloque);
    $(bloque).find('.contenido').slideDown();
    $(bloque).addClass('activo');
  } else {
    ocultarBloques();
    $(bloque).removeClass('activo');
  }
}

mostrarBloque($('.bloque_desplegable').first());

function eliminarBloque(bloque) {
  if (confirm("¿Está seguro de querer eliminar este representante legal?")) {
    if ($('.bloque_desplegable').length > 1) {
      $(bloque).slideUp().remove();
    } else {
      $("#errores_borrar").slideDown();
      setTimeout(function() {
        $("#errores_borrar").slideUp();
      }, 5000);
    }
  }
}

function clonarBloque() {
  var numId = $('.representante_identificador span').length + 1;
  var nuevoId = $('.bloque_desplegable').length + 1;
  var nuevoBloque = $('.bloque_desplegable').first().clone();
  var numeroBloques = $('.bloque_desplegable').length + 1;

  if (numeroBloques >= 4) {
    $('#errores_bloques').slideDown();
    setTimeout(function() {
      $('#errores_bloques').slideUp();
    }, 5000);
  } else {
    nuevoBloque.attr('id', 'bloque_' + nuevoId);
    nuevoBloque.attr('id', 'bloque_' + nuevoId);
    nuevoBloque.find('.representante_identificador span').text(numId++);
    nuevoBloque.find('.form__grupo').each(function(i, el) {
      $(el).find('select').val('');
      $(el).find('select').attr('id', 'el_' + nuevoId + '_' + i);
      $(el).find('input').val('');
      $(el).find('input').attr('id', 'el_' + nuevoId + '_' + i);
      $(el).find('label').attr('for', 'el_' + nuevoId + '_' + i).removeClass('focus');
      $(el).find("input[name='nacimiento[]']").removeClass('hasDatepicker').removeClass('invalido').removeClass('valido');
      $(el).parent().parent().parent().find('.representante_rut').empty();
      $(el).parent().parent().parent().find('.representante_nombre').empty();
      $(el).parent().parent().parent().find('.representante_banco').empty();
      $(el).parent().parent().parent().find('.representante_tipo').empty();
      $(el).find('label').removeClass('focus');
      $(el).find('select').removeClass('valido');
      $(el).find("input[name='nacimiento[]']").removeAttr('data-valid-date').removeClass('invalido');

      if ($(el).find("input[name='nacimiento[]']").val() != '') {
        setTimeout(function() {
          $(el).find("input[name='nacimiento[]']").removeClass('invalido').addClass('valido');
        }, 10);
      }
    });
    nuevoBloque.appendTo(".form");
    CALENDARIO();
    removerFocus();
    showAdicional();
    selectPaso5();
    setTimeout(function() {
      removerSelectFocus();
    }, 5);
    mostrarBloque(nuevoBloque, true);
    $('.form-select').find('label').removeClass('focus');
    fln.formularios.animacion();
    RUT.aplicar();
  }
}

function limpiarBloque(id) {
  $("#" + id + " :text, #" + id + " textarea, #" + id + " select").each(function(i, el) {
    $(el).removeClass("invalido");
    $(el).removeClass("valido");

    if ($(el).data('value')) {
      $(el).val($(el).data('value'));
    }

    if ($(el).data('placeHolder')) {
      $(el).addClass("sin_modificar");
      $(el).val($(el).data('placeHolder'));
    }

    if ("#error_" + $(el).attr('id').length) {
      $("#error_" + $(el).attr('id')).hide('fast');
    }
  });
}