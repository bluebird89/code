import { InMemoryCache } from '@apollo/client';
import { darkMode } from './reactivities/themeVariable';

export default new InMemoryCache({
    typePolicies: {
        Query: {
            fields: {
                darkMode: {
                    read() {
                        return darkMode();
                    }
                }
            }
        }
    }
})
