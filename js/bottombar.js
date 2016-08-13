function tab(id) {
        if(id == 'menuCtrlTab1') {
            toggle('menuCtrlTab1');
            toggle('menuCtrlTab2');
            hide('menuCtrlForm2');
            show('menuCtrlForm1');
        }
        else if(id == 'menuCtrlTab2') {
            toggle('menuCtrlTab1');
            toggle('menuCtrlTab2');
            hide('menuCtrlForm1');
            show('menuCtrlForm2');
        }
        else if(id == 'menuCtrlTabHide') {
            hide('menuCtrlTab1');
            hide('menuCtrlTab2');
            hide('menuCtrlFormDiv');
            hide('menuCtrlTabHide');
            show('menuCtrlTabShow');
        }
        else if(id == 'menuCtrlTabShow') {
            show('menuCtrlTab1');
            show('menuCtrlTab2');
            show('menuCtrlFormDiv');
            hide('menuCtrlTabShow');
            show('menuCtrlTabHide');
        }
    
        else if(id == 'menuInfoTab1') {
            toggle('menuInfoTab1');
            toggle('menuInfoTab2');
            hide('menuInfoForm2');
            show('menuInfoForm1');
        }
        else if(id == 'menuInfoTab2') {
            toggle('menuInfoTab1');
            toggle('menuInfoTab2');
            hide('menuInfoForm1');
            show('menuInfoForm2');
        }
        else if(id == 'menuInfoTabHide') {
            hide('menuInfoTab1');
            hide('menuInfoTab2');
            hide('menuInfoFormDiv');
            hide('menuInfoWrapper');
            hide('menuInfoTabHide');
            show('menuInfoTabShow');
        }
        else if(id == 'menuInfoTabShow') {
            show('menuInfoTab1');
            show('menuInfoTab2');
            show('menuInfoFormDiv');
            show('menuInfoWrapper');
            hide('menuInfoTabShow');
            show('menuInfoTabHide');
        }
        else {
        
        }
}
 
function toggle(id) {
    if(activated(id)) {
        deactivate(id);
    }
    else {
        activate(id);
    }
}

function hide(id) {
    docAddClass(id, 'hidden');
}
function show(id) {
    docRemoveClass(id, 'hidden');
}

function activate(id) {
    docRemoveClass(id, 'inActive');
    docAddClass(id, 'active');
}
function deactivate(id) {
    docRemoveClass(id, 'active');
    docAddClass(id, 'inActive');
}

function activated(id) {
    var e = docGet(id);
    if(e.className.search('active') == -1) {
        return false;
    }
    return true;
}



function docGet(id) {
    return document.getElementById(id);
}
function docAddClass(id, classToAdd) {
    var e = docGet(id);
    if(e.className.length <= 0) {
        e.className = classToAdd;
    }
    else {
        if(e.className.search(classToAdd) == -1) {
            e.className = e.className + ' ' + classToAdd;
        }
    }
}

function docRemoveClass(id, classToRem) {
    var e = docGet(id);
    if(e.className.length > 0) {
        if(e.className.search(classToRem) != -1) {
            e.className = e.className.replace(classToRem, "");
        }
    }
}