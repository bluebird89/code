import { useEffect, useState } from 'react';

const usePerson = (personId) => {
    const [loading, setLoading] = useState(true);
    const [person, setPerson] = useState({});

    useEffect(() => {
        setLoading(true);
        fetch(`https://swapi.co/api/people/${personId}/`)
            .then(response => response.json())
            .then(data => {
                setPerson(data);
                setLoading(false);
            });
    }, [personId]);

    return [loading, person];
};
