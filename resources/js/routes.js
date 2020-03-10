import AllVehicles from './components/AllVehicles.vue';
import AddVehicle from './components/AddVehicle.vue';
import EditVehicle from './components/EditVehicle.vue';
import AllDrivers from './components/AllDrivers.vue';
import AddDriver from './components/AddDriver.vue';
import EditDriver from './components/EditDriver.vue';
import AllFuels from './components/AllFuels.vue';
import AddFuel from './components/AddFuel.vue';
import EditFuel from './components/EditFuel.vue';

export const routes = [
    {
        name: 'vehiclemain',
        path: '/vehicles.vehiclemain',
        component: AllVehicles
    },
    {
        name: 'addVehicle',
        path: '/addVehicle',
        component: AddVehicle
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditVehicle
    },
    {
        name: 'drivermain',
        path: '/drivers.drivermain',
        component: AllDrivers
    },
    {
        name: 'addDriver',
        path: '/addDriver',
        component: AddDriver
    },
    {
        name: 'editDriver',
        path: '/edit/:id',
        component: EditDriver
    },
    {
        name: 'fuelmain',
        path: '/fuels.fuelmain',
        component: AllFuels
    },
    {
        name: 'addFuel',
        path: '/add',
        component: AddFuel
    },
    {
        name: 'editFuel',
        path: '/edit/:id',
        component: EditFuel
    }
];