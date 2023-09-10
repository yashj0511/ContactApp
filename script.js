// Function to validate the contact form
const form = document.getElementById('form');

function validateForm() 
{
    
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const subject = document.getElementById('subject').value.trim();
    const message = document.getElementById('messege').value.trim();
    let isValid = true;

    // Reset error messages
    document.getElementById('nameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('subjectError').textContent = '';
    document.getElementById('messageError').textContent = '';

    // Rest of your validation code remains the same
    // ...
    // Validate name
    if (name === '') 
    {
        document.getElementById('nameError').textContent = 'Name is required';
        console.log('name is required');
        isValid = false;
    }

    // Validate email
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (email === '' || !emailPattern.test(email)) {
        document.getElementById('emailError').textContent = 'Invalid email format';
        isValid = false;
    }

    // Validate subject
    if (subject === '') {
        document.getElementById('subjectError').textContent = 'Subject is required';
        isValid = false;
    }

    // Validate message
    if (message === '') 
    {
        document.getElementById('messageError').textContent = 'Message is required';
        isValid = false;
    }

    // Prevent form submission if there are validation errors
    if (isValid) 
    {
        // Show the success message
       
        document.getElementById('successMessage').style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' }); // Smooth scrolling to the top
        console.log('sucess ');
        // Automatically hide the success message after 3 seconds (adjust the time as needed)
        setTimeout(function () 
        {
            document.getElementById('successMessage').style.display = 'none';
            
        }, 3000); // 3000 milliseconds (3 seconds)

        

        return true; // Allow the form to be submitted
    } else 
    {
        return false; // Prevent the form from being submitted
    }
    
}

    //for mobile devices
let btn=document.getElementById('btn');
btn.addEventListener('ontouchstart',(e)=>
{
    if(validateForm())
    {
        
        document.getElementById('successMessage').style.display = 'block';
         window.scrollTo({ top: 0, behavior: 'smooth' });
        setTimeout(function () 
        {
            document.getElementById('successMessage').style.display = 'none';
            
        }, 5000); // 5000 milliseconds (5 seconds)
        form.dispatchEvent(new Event('submit'));

    }
}) 

 form.addEventListener('submit',(e)=>
{
    e.preventDefault();   
    
    if(validateForm())
    {
        
    setTimeout( () => {
        form.submit()
        const name = document.getElementById('name');
        name.value='';
        const email = document.getElementById('email');
        email.value='';
        const subject = document.getElementById('subject');
        subject.value='';
        const message = document.getElementById('messege');
        message.value='';
    
    }, 5000);
    console.log('Submitting');
    }
    
})

