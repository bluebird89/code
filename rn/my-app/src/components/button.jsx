import { useQuery } from '@apollo/client';
import React from 'react';
import { Moon, Sun } from 'react-feather';
import { darkMode, GET_DARK_MODE } from '../graphql/reactivities/themeVariable.js';


const ButtonComponent = () => {

  const { loading, error, data } = useQuery(GET_DARK_MODE);

  const toggleMode = () => {
    // TODO:Can't change value
    darkMode(!darkMode);
    console.log("Clicked toggle mode!" + JSON.stringify(data));
  }

  return (
    <div>
      {
        data.darkMode ? (
          <button
            style={{
              backgroundColor: '#00008B',
              border: 'none',
              padding: '2%',
              height: '120px',
              borderRadius: '15px',
              color: 'white',
              fontSize: '18px',
              marginTop: '5%',
              cursor: 'pointer'
            }}
            onClick={toggleMode}
          >
            <Sun />
            <p>Switch To Light Mood</p>
          </button>
        ) : (
            <button
              style={{
                backgroundColor: '#00008B',
                border: 'none',
                padding: '2%',
                height: '120px',
                borderRadius: '15px',
                color: 'white',
                fontSize: '18px',
                marginTop: '5%',
                cursor: 'pointer'
              }}
              onClick={toggleMode}
            >
              <Moon />
              <p>Switch To Dark Mood</p>
            </button>
          )
      }
    </div>
  )
}

export default ButtonComponent;