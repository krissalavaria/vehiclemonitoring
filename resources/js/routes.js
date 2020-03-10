import AllVehicles from './components/AllVehicles.vue';
import AddVehicle from './components/AddVehicle.vue';
import EditVehicle from './components/EditVehicle.vue';
import AllDrivers from './components/AllDrivers.vue';
import AddDriver from './components/AddDriver.vue';
import EditDriver from './components/EditDriver.vue';
import AllFuels from './components/AllFuels.vue';
import AddFuel from './components/AddFuel.vue';
import EditFuel from './components/EditFuel.vue';
import Admin from './components/Admin.vue';
import AddAdmin from './components/AddAdmin.vue';
import EditAdmin from './components/EditAdmin.vue';

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
        path: '/editDriver/:id',
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
        path: '/editFuel/:id',
        component: EditFuel
    },
    {
        name: 'adminmain',
        path: '/admins.adminmain',
        component: Admin
    },
    {
        name: 'editAdmin',
        path: '/editAdmin/:id',
        component: EditAdmin
    },
    {
        name: 'addAdmin',
        path: '/addAdmin',
        component: AddAdmin
    }
];
