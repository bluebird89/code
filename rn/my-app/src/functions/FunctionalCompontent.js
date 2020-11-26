import React from 'react';

const FunctionalCompontent = ({ number = 10 }) => {
    return (
        <div>
            <p>Functional Compontent</p>
            <p>state is {number}</p>
        </div>
    )
}

export default FunctionalCompomtent
