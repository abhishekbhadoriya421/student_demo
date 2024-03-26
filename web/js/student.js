const state = document.getElementById('student-state');
const district = document.getElementById('student-district');
const studentCategory = document.getElementById('student-category');
const OBCfilehandler = document.getElementsByClassName('form-group field-student-imagefile')[0];

OBCfilehandler.style.display = 'none';


studentCategory.addEventListener('click',()=>{
    // if Category is Choose
    if(studentCategory.value === 'OBC' || studentCategory.value === 'SC' || studentCategory.value === 'ST'){
        OBCfilehandler.style.display = 'block';
    }else{
        OBCfilehandler.style.display = 'none';
    }
})



//Handling state dropdown using ajax fetching district data according to the value selected in state dropdown
// async function handleState(e) {
    // console.log() ;
//     try {
//         let state = e.target.value;
//         const response = await fetch('/student/state-district', {
//             method: 'POST',
//             headers: {"Content-Type": "application/json"},
//             body: JSON.stringify(state)
//         });

//         if (!response.ok) {
//             console.log("Not Found");
//         } else {
//             console.log('here')
//             const data = await response.json();

//         }
//     } catch (err) {
//         console.log(err);
//     }

// }

// async  function handleState(e) {
//     const state = e.target.value;
//
//     const url = '/student/state-district?state=' + state;
//
//     const res = await fetch(url, {
//         method: 'post',
//     });
//
//     const data = await  res.json();
//     console.log(data);
// }
//
// state.addEventListener('change',handleState);