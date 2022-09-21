import Alpine from 'alpinejs';
import * as Turbo from "@hotwired/turbo";


Turbo.start();

window.Alpine = Alpine


window.employeeLocationAlpine = () => {
    return {
        employeeName: "",
        officeName: "",
        employeeId: "",
        officeId: "",
        detachModalOpened: false,

        openDetachModal(employeeName, employeeId, officeName, officeId) {
            this.employeeName = employeeName;
            this.employeeId = employeeId;

            this.officeName = officeName;
            this.officeId = officeId;
            this.detachModalOpened = true;
        },
    };
};
Alpine.start()