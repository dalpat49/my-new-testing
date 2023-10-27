<?php
use App\Models\Role;
function isSalesManager($checkParent=true){
    if($checkParent){
        return backpack_user()->hasAnyRole([Role::SALES_MANAGER,Role::ADMIN,Role::SUPER_ADMIN]);
    }
    return backpack_user()->hasRole(Role::SALES_MANAGER);
}
function isSalesAssistantManager($checkParent=true){
    if($checkParent){
        return backpack_user()->hasAnyRole([Role::SALES_ASSISTANT_MANAGER,Role::SALES_MANAGER,Role::ADMIN,Role::SUPER_ADMIN]);
    }
    return backpack_user()->hasRole(Role::SALES_ASSISTANT_MANAGER);
}
function isTeamLeader($checkParent=true){
    if($checkParent){
        return backpack_user()->hasAnyRole([Role::SALES_TEAM_LEADER,Role::SALES_ASSISTANT_MANAGER,Role::SALES_MANAGER,Role::ADMIN,Role::SUPER_ADMIN]);
    }
    return backpack_user()->hasRole(Role::SALES_TEAM_LEADER);
}
function isSalesAgent($checkParent=true){
    if($checkParent){
        return backpack_user()->hasAnyRole([Role::SALES_AGENT,Role::SALES_TEAM_LEADER,Role::SALES_ASSISTANT_MANAGER,Role::SALES_MANAGER,Role::ADMIN,Role::SUPER_ADMIN]);
    }
    return backpack_user()->hasRole(Role::SALES_AGENT);
}
function isSalesTeamLeader($checkParent=true){
    if($checkParent){
        return backpack_user()->hasAnyRole([Role::SALES_TEAM_LEADER,Role::SALES_ASSISTANT_MANAGER,Role::SALES_MANAGER,Role::ADMIN,Role::SUPER_ADMIN]);
    }
    return backpack_user()->hasRole(Role::SALES_TEAM_LEADER);
}

function isSalesFos($checkParent=true){
    if($checkParent){
        return backpack_user()->hasAnyRole([Role::SALES_FOS,Role::SALES_TEAM_LEADER,Role::SALES_ASSISTANT_MANAGER,Role::SALES_MANAGER,Role::ADMIN,Role::SUPER_ADMIN]);
    }
    return backpack_user()->hasRole(Role::SALES_FOS);
}


function getMyId(){
    if (isAnyTeamLeader()) {
        return \App\Models\TeamLeader::where('user_id',backpack_user()->id)->value('id');
    }
    if (isAnyAssistantManager()) {
        return \App\Models\AssistantManager::where('user_id',backpack_user()->id)->value('id');
    }
    if (isAnyAgent()) {
        return \App\Models\Agent::where('user_id',backpack_user()->id)->value('id');
    }
}

function isAnyAssistantManager(){
    return backpack_user()->hasAnyRole([Role::SALES_ASSISTANT_MANAGER,Role::MARKETING_ASSISTANT_MANAGER,Role::DEVOPS_ASSISTANT_MANAGER,Role::BILLING_ASSISTANT_MANAGER,Role::SUPPORT_ASSISTANT_MANAGER,Role::OPERATION_ASSISTANT_MANAGER]);
}
function isAnyTeamLeader(){
    return backpack_user()->hasAnyRole([Role::SALES_TEAM_LEADER,Role::MARKETING_TEAM_LEADER,Role::DEVOPS_TEAM_LEADER,Role::BILLING_TEAM_LEADER,Role::SUPPORT_TEAM_LEADER,Role::OPERATION_TEAM_LEADER]);
}

function isAnyAgent(){
    return backpack_user()->hasAnyRole([Role::OPERATION_VALIDATION_AGENT,Role::OPERATION_DATA_ENTRY,Role::MARKETING_AGENT,Role::SALES_AGENT,Role::SUPPORT_AGENT,Role::BILLING_AGENT,Role::DEVOPS_AGENT,Role::SALES_FOS]);
}

function isAnyOperationTeam()
{
    return backpack_user()->hasAnyRole([Role::SUPER_ADMIN,Role::ADMIN,Role::OPERATION_MANAGER,Role::OPERATION_ASSISTANT_MANAGER,Role::OPERATION_TEAM_LEADER,Role::OPERATION_VALIDATION_AGENT,Role::OPERATION_DATA_ENTRY]);
}

function isOperationManager($checkParent=true){
    if($checkParent){
        return backpack_user()->hasAnyRole([Role::OPERATION_MANAGER,Role::ADMIN,Role::SUPER_ADMIN]);
    }
    return backpack_user()->hasRole(Role::OPERATION_MANAGER);
}
function isOperationAssistantManager($checkParent=true){
    if($checkParent){
        return backpack_user()->hasAnyRole([Role::OPERATION_ASSISTANT_MANAGER,Role::OPERATION_MANAGER,Role::ADMIN,Role::SUPER_ADMIN]);
    }
    return backpack_user()->hasRole(Role::OPERATION_ASSISTANT_MANAGER);
}
function isOperationTeamLeader($checkParent=true){
    if($checkParent){
        return backpack_user()->hasAnyRole([Role::OPERATION_TEAM_LEADER,Role::OPERATION_ASSISTANT_MANAGER,Role::OPERATION_MANAGER,Role::ADMIN,Role::SUPER_ADMIN]);
    }
    return backpack_user()->hasRole(Role::OPERATION_TEAM_LEADER);
}
function isOperationDateEntry($checkParent=true){
    if($checkParent){
        return backpack_user()->hasAnyRole([Role::OPERATION_DATA_ENTRY,Role::OPERATION_TEAM_LEADER,Role::OPERATION_ASSISTANT_MANAGER,Role::OPERATION_MANAGER,Role::ADMIN,Role::SUPER_ADMIN]);
    }
    return backpack_user()->hasRole(Role::OPERATION_DATA_ENTRY);
}
function isOperationValidationAgent($checkParent=true){
    if($checkParent){
        return backpack_user()->hasAnyRole([Role::OPERATION_VALIDATION_AGENT,Role::OPERATION_TEAM_LEADER,Role::OPERATION_ASSISTANT_MANAGER,Role::OPERATION_MANAGER,Role::ADMIN,Role::SUPER_ADMIN]);
    }
    return backpack_user()->hasRole(Role::OPERATION_VALIDATION_AGENT);
}
