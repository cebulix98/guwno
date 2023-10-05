/**
 * is value empty
 * @param {*} val 
 */
function IsValEmpty(val) {
    if(val=="" || val==null || val=="unidentified") return null;
    return val;
}

/**
 * add new box
 * @param {*} element_counter_id 
 * @param {*} indexes_classname 
 * @param {*} callfunction 
 */
function AddService(element_counter_id, indexes_classname, callfunction, parent_id, parent_class, container_id, delete_callfunction, additional) {
     var last_index = ServiceLastIndexRead(element_counter_id);
     last_index = parseInt(last_index, 10);

     var index = last_index + 1;

     ServiceNumberAdd(element_counter_id, 1);
     callfunction(index, parent_id, parent_class, container_id, indexes_classname, delete_callfunction, additional);

     ServiceLastIndexSet(element_counter_id, index);
     RecalculateServiceIndexes('.'+indexes_classname);

     return index;
}

/**
 * remove box
 * @param {*} id 
 * @param {*} element_counter_id 
 * @param {*} indexes_classname 
 */
function RemoveService(id, element_counter_id, indexes_classname) {
    ServiceNumberAdd(element_counter_id, -1);
    element = document.getElementById(id);
    element.parentNode.removeChild(element);
    RecalculateServiceIndexes(indexes_classname);
}

/**
 * increase/decrease number of services
 * @param {*} id counter element id
 * @param {*} number number to increase/decrease
 */
function ServiceNumberAdd(id, number) {
    var element = document.getElementById(id);
    var max = element.getAttribute('data-max');
    max = parseInt(max, 10);
    max += number;
    element.setAttribute('data-max', max);
}


/**
 * get last index of service element
 * @param {*} id counter element id
 */
function ServiceLastIndexRead(id) {
    var element = document.getElementById(id);
    var index = element.getAttribute('data-last_index');
    return index;
}

/**
 * set last index
 * @param {*} id counter element id
 * @param {*} index last element index
 */
function ServiceLastIndexSet(id, index) {
    var element = document.getElementById(id);
    element.setAttribute('data-last_index', index);
}

/**
 * create delete button
 * @param {*} callfunction function onclick
 */
function CreateDeleteButton(callfunction) {
    var button = CreateButton("btn btn-primary fas fa-minus", callfunction, "");
    return button;
}

/**
 * recalculate indexes of services
 * @param {*} classname 
 */
function RecalculateServiceIndexes(classname) {
    var count = 1;
    $(classname).each(function() {
        this.innerHTML = count+".";
        count++;
    });
}

/**
 * create parent container
 * @param {*} count 
 * @param {*} parent_id 
 * @param {*} container_class 
 * @param {*} index_name 
 * @param {*} is_hidden 
 */
function CreateParentBox(count, parent_id, container_class, index_name, is_hidden) {
    var parent = CreateDiv(parent_id, container_class +" col-md-12 row");

    var classnames=" font-weight-bold ";
    if(is_hidden) classnames+=" hidden ";

    var div_index = CreateDiv(parent_id + "_index", index_name+classnames);
    div_index.innerHTML = count + ".";
    
    parent.appendChild(div_index);

    return parent;
}